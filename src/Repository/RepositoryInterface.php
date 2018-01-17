<?php

namespace Loevgaard\DandomainFoundation\Repository;

interface RepositoryInterface
{
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
}
