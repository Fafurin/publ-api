<?php

namespace App\Command\Admin\Position;

use App\Entity\Position;
use App\Exception\PositionAlreadyExistsException;
use App\Model\Admin\Position\PositionRequest;
use App\Repository\PositionRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreatePosition implements CreatePositionInterface
{
    public function __construct(
        private readonly PositionRepository     $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(PositionRequest $request): void
    {
        if ($this->repository->existsByTitle($request->getTitle())) {
            throw new PositionAlreadyExistsException();
        }
        $this->em->persist((new Position())->setTitle($request->getTitle()));
        $this->em->flush();

    }

}
