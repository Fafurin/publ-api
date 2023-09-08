<?php

namespace App\Service;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class RoleService implements RoleServiceInterface
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function grantAdmin(int $userId): void
    {
        $this->grantRole($userId, 'ROLE_ADMIN');
    }

    public function grantModerator(int $userId): void
    {
        $this->grantRole($userId, 'ROLE_MODERATOR');
    }

    private function grantRole(int $userId, string $role): void
    {
        $user = $this->userRepository->getUser($userId);
        $user->setRoles([$role]);

        $this->entityManager->flush();
    }

}
