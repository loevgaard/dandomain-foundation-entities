<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Repository\Generated\AbstractRepositoryTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractRepository extends ServiceEntityRepository implements RepositoryInterface
{
    use AbstractRepositoryTrait;

    /**
     * @var array
     */
    protected $options;

    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        $this->options = [];

        parent::__construct($registry, $entityClass);
    }

    /**
     * @param $object
     * @throws \Doctrine\ORM\ORMException
     */
    public function persist($object) : void
    {
        $this->getEntityManager()->persist($object);
    }

    /**
     * @param null|object|array $entity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush($entity = null) : void
    {
        $this->getEntityManager()->flush($entity);
    }

    /**
     * @param object $entity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param array $options
     * @return \Generator
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function iterate(array $options = []): \Generator
    {
        $options['iterate'] = true;
        $this->setOptions($options);

        return $this->result($this->createQueryBuilder('c'));
    }

    /**
     * Will remove entities based on the ids you input.
     *
     * @param int[] $in
     * @param int[] $notIn
     */
    public function removeByIds(array $in = [], array $notIn = [])
    {
        if (!count($in) && !count($notIn)) {
            return;
        }

        $qb = $this->createQueryBuilder('e');

        if ($this->getClassMetadata()->hasField('deletedAt')) {
            $qb->update()
                ->set('e.deletedAt', ':date')
                ->setParameter('date', new DateTimeImmutable())
            ;
        } else {
            $qb->delete();
        }

        if (count($in)) {
            $qb->andWhere($qb->expr()->in('e.id', ':inIds'));
            $qb->setParameter('inIds', $in);
        }

        if (count($notIn)) {
            $qb->andWhere($qb->expr()->notIn('e.id', ':notInIds'));
            $qb->setParameter('notInIds', $notIn);
        }

        $qb->getQuery()->execute();
    }

    /**
     * @param QueryBuilder $qb
     * @return \Generator|mixed
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function result(QueryBuilder $qb)
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        $options = $resolver->resolve($this->options);

        // reset options
        $this->options = [];

        if($options['iterate']) {
            return $this->generator($qb, $options);
        } else {
            return $qb->getQuery()->getResult();
        }
    }

    /**
     * @param QueryBuilder $qb
     * @param array $options
     * @return \Generator
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function generator(QueryBuilder $qb, array $options) : \Generator
    {
        $em = $this->getEntityManager();

        $result = $qb->getQuery()->iterate();
        $i = 1;
        foreach ($result as $item) {
            $obj = $item[0];
            yield $obj;

            if ($options['update']) {
                if (0 == $i % $options['bulkSize']) {
                    $em->flush();
                    $em->clear();
                }
            } else {
                $em->detach($obj);
            }

            ++$i;
        }

        if ($options['update']) {
            $em->flush();
            $em->clear();
        }
    }

    /**
     * @throws \Doctrine\Common\Persistence\Mapping\MappingException
     */
    public function clearAll()
    {
        $this->getEntityManager()->clear();
    }

    /**
     * @param $id
     *
     * @return bool|\Doctrine\Common\Proxy\Proxy|null|object
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function getReference($id)
    {
        return $this->getEntityManager()->getReference($this->getClassName(), $id);
    }

    /**
     * @param array $options
     * @return AbstractRepository
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * On 90% of the entities there is an external id so we put this helper method here
     * so that all these repository doesn't have to implement the same method, instead they
     * can call this method and just create the type hint and validation of input.
     *
     * @param $externalId
     *
     * @return null|object
     */
    protected function _findOneByExternalId($externalId)
    {
        $obj = $this->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'iterate' => false,
            'update' => false,
            'bulkSize' => 50,
        ]);
    }
}
