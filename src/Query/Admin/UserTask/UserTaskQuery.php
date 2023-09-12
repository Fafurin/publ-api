<?php

namespace App\Query\Admin\UserTask;

use App\Mapper\UserTaskBriefDetailsMapper;
use App\Mapper\UserTaskFullDetailsMapperInterface;
use App\Model\Admin\UserTask\UserTaskListResponse;
use App\Repository\UserRepository;
use App\Repository\UserTaskRepository;
use Symfony\Bundle\SecurityBundle\Security;

class UserTaskQuery implements UserTaskQueryInterface
{
    public function __construct(
        private readonly UserTaskRepository $userTaskRepository,
        private readonly UserTaskBriefDetailsMapper $userTaskBriefDetailsMapper,
        private readonly UserRepository $userRepository,
        private readonly Security $security,
        private readonly UserTaskFullDetailsMapperInterface $userTaskFullDetailsMapper,
    ) {
    }

    public function getAllTasksByUpdatedAt(): UserTaskListResponse
    {
        return $this->userTaskBriefDetailsMapper->map($this->userTaskRepository->findAllSortedByUpdatedAt());
    }

    public function getUserTasks(): UserTaskListResponse
    {
        $user = $this->userRepository->findByEmail($this->security->getUser()->getUserIdentifier());

        return $this->userTaskFullDetailsMapper->map($user->getTasks()->toArray());
    }
}
