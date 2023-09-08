<?php

namespace App\Command\Admin\Position;

use App\Exception\PositionNotFoundException;
use App\Model\Admin\Position\PositionRequest;
use App\Repository\PositionRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpdatePosition implements UpdatePositionInterface
{
    public function __construct(
        private readonly PositionRepository     $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(PositionRequest $request, int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new PositionNotFoundException();
        }
        $status = $this->repository->find($id);

        $status->setTitle($request->getTitle());

        $this->em->persist($status);
        $this->em->flush();
    }

}
