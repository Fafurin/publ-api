<?php

namespace App\Mapper;

use App\Entity\User;
use App\Entity\UserTask;
use App\Model\Admin\UserTask\UserTaskListResponse;
use App\Model\Admin\UserTask\UserTaskFullDetailsResponse;
use App\Model\User\UserListItem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

// This mapper is designed to map output information about book order edit/view
class UserTaskBriefDetailsMapper implements UserTaskBriefDetailsMapperInterface
{
    public function map(array $tasks): UserTaskListResponse
    {
        $items = array_map(
            fn (UserTask $task) => (new UserTaskFullDetailsResponse())
                ->setId($task->getId())
                ->setTitle($task->getTitle())
                ->setStartedAt($task->getStartedAt()?->getTimestamp())
                ->setUpdatedAt($task->getUpdatedAt()?->getTimestamp())
                ->setFinishedAt($task->getFinishedAt()?->getTimestamp())
                ->setStatus($task->getStatus()->getTitle())
                ->setUserName($this->mapUser($task->getUser())->getName())
                ->setUserPosition($this->mapUser($task->getUser())->getPosition())
                ->setOrderId($task->getBookOrder()->getId()),
            $tasks
        );

        return new UserTaskListResponse($items);
    }

    private function mapUser(User $user): UserListItem
    {
        return (new UserListItem())
            ->setName($user->getName())
            ->setPosition($user->getPosition()?->getTitle());
    }

}
