<?php

namespace App\Query\Admin\User;

use App\Entity\User;
use App\Model\User\UserListItem;
use App\Model\User\UserListResponse;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;

class UserQuery implements UserQueryInterface
{

    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly Security       $security,
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

    public function getUserRole(): string
    {
        if ($this->security->getUser()) {
            $user = $this->userRepository->findByEmail($this->security->getUser()->getUserIdentifier());
            return implode($user->getRoles());
        }

        return 'NO_ROLE';
    }

}
