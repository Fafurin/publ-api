<?php

namespace App\Mapper;

use App\Entity\UserTask;
use App\Model\Admin\UserTask\UserTaskListResponse;
use App\Model\User\UserTaskDetails;

// This mapper is designed to map output information about user in admin/users/{id}/view
// and to map output information about user tasks in /user/tasks

class UserTaskFullDetailsMapper implements UserTaskFullDetailsMapperInterface
{
    public function __construct(
        private readonly BookOrderFullDetailsMapper $bookOrderFullDetailsMapper,
        private readonly BookFullDetailsMapper $bookFullDetailsMapper,
    ) {
    }

    public function map(array $tasks): UserTaskListResponse
    {
        return new UserTaskListResponse(array_map(
            fn (UserTask $task) => (new UserTaskDetails())
                ->setId($task->getId())
                ->setTitle($task->getTitle())
                ->setStartedAt($task->getStartedAt()?->getTimestamp())
                ->setUpdatedAt($task->getUpdatedAt()?->getTimestamp())
                ->setFinishedAt($task->getFinishedAt()?->getTimestamp())
                ->setStatus($task->getStatus()->getTitle())
                ->setOrder(
                    $this->bookOrderFullDetailsMapper->map($task->getBookOrder())
                        ->setBook(
                            $this->bookFullDetailsMapper->map($task->getBookOrder()->getBook())
                        )
                ), $tasks
        ));
    }
}
