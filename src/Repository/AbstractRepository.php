<?php

namespace Loevgaard\DandomainFoundation\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Loevgaard\DandomainDateTime\DateTimeImmutable;
use Loevgaard\DandomainFoundation\Repository\Generated\AbstractRepositoryTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractRepository extends ServiceEntityRepository
{
    use AbstractRepositoryTrait;

    /**
     * On 90% of the entities there is an external id so we put this helper method here
     * so that all these repository doesn't have to implement the same method, instead they
     * can call this method and just create the type hint and validation of input
     *
     * @param $externalId
     * @return null|object
     */
    protected function _findOneByExternalId($externalId)
    {
        $obj = $this->findOneBy([
            'externalId' => $externalId,
        ]);

        return $obj;
    }

    /**
     * @param array $options
     * @return \Generator
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function iterate(array $options = []): \Generator
    {
        $resolver = new OptionsResolver();
        $this->configureIterateOptions($resolver);
        $options = $resolver->resolve($options);

        $em = $this->getEntityManager();

        $qb = $this->createQueryBuilder('c');

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
        }
    }

    /**
     * Will remove entities based on the ids you input
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

        if($this->getClassMetadata()->hasField('deletedAt')) {
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

    protected function configureIterateOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'update' => true,
            'bulkSize' => 50,
        ]);
    }
}
