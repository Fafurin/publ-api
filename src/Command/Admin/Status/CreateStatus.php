<?php

namespace App\Command\Admin\Status;

use App\Entity\Status;
use App\Exception\StatusAlreadyExistsException;
use App\Model\Admin\Status\StatusRequest;
use App\Repository\StatusRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreateStatus implements CreateStatusInterface
{
    public function __construct(
        private readonly StatusRepository       $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(StatusRequest $request): void
    {
        if ($this->repository->existsByTitle($request->getTitle())) {
            throw new StatusAlreadyExistsException();
        }
        $this->em->persist((new Status())->setTitle($request->getTitle()));
        $this->em->flush();

    }

}
