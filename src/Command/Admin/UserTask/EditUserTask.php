<?php

namespace App\Command\Admin\UserTask;

use App\Model\Admin\UserTask\UserTaskBriefDetailsResponse;
use App\Repository\UserTaskRepository;

class EditUserTask implements EditUserTaskInterface
{
    public function __construct(
        private readonly UserTaskRepository $userTaskRepository,
    ) {
    }

    public function handle(int $id): UserTaskBriefDetailsResponse
    {
        $task = $this->userTaskRepository->find($id);

        return (new UserTaskBriefDetailsResponse())
            ->setName($task->getUser()->getName())
            ->setTitle($task->getTitle());
    }

}
