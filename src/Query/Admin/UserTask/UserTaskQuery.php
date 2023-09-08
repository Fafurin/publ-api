<?php

namespace App\Query\Admin\UserTask;

use App\Mapper\UserTaskBriefDetailsMapper;
use App\Model\Admin\UserTask\UserTaskListResponse;
use App\Repository\UserTaskRepository;

class UserTaskQuery implements UserTaskQueryInterface
{

    public function __construct(
        private readonly UserTaskRepository         $userTaskRepository,
        private readonly UserTaskBriefDetailsMapper $userTaskBriefDetailsMapper
    ) {
    }

    public function getAllTasksByUpdatedAt(): UserTaskListResponse
    {
        return $this->userTaskBriefDetailsMapper->map($this->userTaskRepository->findAllSortedByUpdatedAt());
    }
}
