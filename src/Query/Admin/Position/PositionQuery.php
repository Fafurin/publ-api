<?php

namespace App\Query\Admin\Position;

use App\Entity\Position;
use App\Model\Admin\Position\PositionListResponse;
use App\Model\Admin\Position\PositionResponse;
use App\Repository\PositionRepository;

class PositionQuery implements PositionQueryInterface
{

    public function __construct(
        private readonly PositionRepository $repository,
    ) {
    }

    public function handle(): PositionListResponse
    {
        $statuses = $this->repository->findAllSortedByTitle();
        $items = array_map(
            fn (Position $status) =>
            (new PositionResponse())
                ->setId($status->getId())
                ->setTitle($status->getTitle()),
            $statuses
        );

        return new PositionListResponse($items);
    }

}
