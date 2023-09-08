<?php

namespace App\Command\Admin\Status;

use App\Exception\StatusNotFoundException;
use App\Model\Admin\Status\StatusResponse;
use App\Repository\StatusRepository;

class EditStatus implements EditStatusInterface
{
    public function __construct(
        private readonly StatusRepository $repository,
    ) {
    }

    public function handle(int $id): StatusResponse
    {
        if (!$this->repository->existsById($id)) {
            throw new StatusNotFoundException();
        }
        $status = $this->repository->find($id);

        return (new StatusResponse())
            ->setId($status->getId())
            ->setTitle($status->getTitle());
    }

}
