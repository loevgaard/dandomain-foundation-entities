<?php

namespace Loevgaard\DandomainFoundation\Repository;

interface RepositoryInterface
{
    /**
     * This method clears all entities in the entity manager, not only the entity associated with this repository
     *
     * @return void
     */
    public function clearAll();

    /**
     * @param array $options
     * @return \Generator
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function iterate(array $options = []): \Generator;

    /**
     * Will remove entities based on the ids you input
     *
     * @param int[] $in
     * @param int[] $notIn
     */
    public function removeByIds(array $in = [], array $notIn = []);

    /**
     * Save should call persist and flush successively
     *
     * @param object $entity The object to persist and flush
     */
    public function save($entity);
}
