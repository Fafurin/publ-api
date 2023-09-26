<?php

namespace App\Query\Admin\User;

use App\Entity\User;
use App\Mapper\UserTaskFullDetailsMapperInterface;
use App\Model\User\UserFullDetails;
use App\Model\User\UserListItem;
use App\Model\User\UserListResponse;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;

class UserQuery implements UserQueryInterface
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly UserTaskFullDetailsMapperInterface $userTaskFullDetailsMapper,
        private readonly Security $security
    ) {
    }

    public function getAllUsers(): UserListResponse
    {
        $users = $this->userRepository->findAll();

        $items = array_map(
            fn (User $user) => (new UserListItem())
                ->setId($user->getId())
                ->setName($user->getName())
                ->setPosition($user->getPosition()?->getTitle())
                ->setTaskCount(count($user->getTasks())),
            $users
        );

        return new UserListResponse($items);
    }

    public function getCurrentUserInfo(): UserFullDetails
    {
        return $this->getUserInfoById($this->security->getUser()->getId());
    }

    public function getUserInfoById(int $id): UserFullDetails
    {
        $user = $this->userRepository->find($id);
        $tasks = $this->userTaskFullDetailsMapper->map($user->getTasks()->toArray());

        return (new UserFullDetails())
            ->setId($user->getId())
            ->setName($user->getName())
            ->setEmail($user->getEmail())
            ->setPhone($user->getProfile()?->getPhone())
            ->setPosition($user->getPosition()?->getTitle())
            ->setRoles(implode($user->getRoles()))
            ->setAddress($user->getProfile()?->getAddress())
            ->setBirthdate($user->getProfile()->getBirthdate()?->getTimestamp())
            ->setTasks($tasks);
    }
}
