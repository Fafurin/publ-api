<?php

namespace App\Query\Admin\Status;

use App\Entity\Status;
use App\Model\Admin\Status\StatusListResponse;
use App\Model\Admin\Status\StatusResponse;
use App\Repository\StatusRepository;

class StatusQuery implements StatusQueryInterface
{

    public function __construct(
        private readonly StatusRepository $repository,
    ) {
    }

    public function handle(): StatusListResponse
    {
        $statuses = $this->repository->findAllSortedByTitle();
        $items = array_map(
            fn (Status $status) =>
            (new StatusResponse())
                ->setId($status->getId())
                ->setTitle($status->getTitle()),
            $statuses
        );

        return new StatusListResponse($items);
    }

}
