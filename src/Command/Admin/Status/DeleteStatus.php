<?php

namespace App\Command\Admin\Status;

use App\Exception\StatusNotFoundException;
use App\Repository\StatusRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteStatus implements DeleteStatusInterface
{
    public function __construct(
        private readonly StatusRepository       $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new StatusNotFoundException();
        }
        $status = $this->repository->find($id);

        $status->setIsDeleted('true');

        $this->em->persist($status);
        $this->em->flush();
    }

}
