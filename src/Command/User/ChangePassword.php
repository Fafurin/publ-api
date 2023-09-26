<?php

namespace App\Command\User;

use App\Entity\User;
use App\Model\User\ChangePasswordRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ChangePassword implements ChangePasswordInterface
{
    private const SUCCESS_RESPONSE = 'User password has been changed';
    private const ERROR_RESPONSE = 'Passwords dont match';

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly Security $security,
        private readonly UserPasswordHasherInterface $hasher,
    ) {
    }

    public function handle(ChangePasswordRequest $request): string
    {
        /** @var User $user */
        $user = $this->security->getUser();

        if ($this->hasher->isPasswordValid($user, $request->getOldPassword())) {
            $user->setPassword($this->hasher->hashPassword($user, $request->getPassword()));

            $this->em->persist($user);

            $this->em->flush();

            return self::SUCCESS_RESPONSE;
        } else {
            return self::ERROR_RESPONSE;
        }
    }
}
