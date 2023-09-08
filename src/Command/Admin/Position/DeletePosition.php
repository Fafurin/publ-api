<?php

namespace App\Command\Admin\Position;

use App\Exception\PositionNotFoundException;
use App\Repository\PositionRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeletePosition implements DeletePositionInterface
{
    public function __construct(
        private readonly PositionRepository       $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new PositionNotFoundException();
        }
        $status = $this->repository->find($id);

        $status->setIsDeleted('true');

        $this->em->persist($status);
        $this->em->flush();
    }

}
