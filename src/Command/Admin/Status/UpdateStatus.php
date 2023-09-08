<?php

namespace App\Command\Admin\Status;

use App\Exception\StatusNotFoundException;
use App\Model\Admin\Status\StatusRequest;
use App\Repository\StatusRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpdateStatus implements UpdateStatusInterface
{
    public function __construct(
        private readonly StatusRepository       $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(StatusRequest $request, int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new StatusNotFoundException();
        }
        $status = $this->repository->find($id);

        $status->setTitle($request->getTitle());

        $this->em->persist($status);
        $this->em->flush();
    }

}
