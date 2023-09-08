<?php

namespace App\Command\Admin\Position;

use App\Exception\PositionNotFoundException;
use App\Model\Admin\Position\PositionResponse;
use App\Repository\PositionRepository;

class EditPosition implements EditPositionInterface
{
    public function __construct(
        private readonly PositionRepository $repository,
    ) {
    }

    public function handle(int $id): PositionResponse
    {
        if (!$this->repository->existsById($id)) {
            throw new PositionNotFoundException();
        }
        $status = $this->repository->find($id);

        return (new PositionResponse())
            ->setId($status->getId())
            ->setTitle($status->getTitle());
    }

}
