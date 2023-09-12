<?php

namespace App\Command\Admin\User;

use App\Entity\User;
use App\Exception\UserAlreadyExistsException;
use App\Model\Admin\User\SignUpRequest;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUser implements CreateUserInterface
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly AuthenticationSuccessHandler $successHandler
    ) {
    }

    public function handle(SignUpRequest $signUpRequest): Response
    {
        if ($this->userRepository->existsByEmail($signUpRequest->getEmail())) {
            throw new UserAlreadyExistsException();
        }

        $user = (new User())
            ->setName($signUpRequest->getName())
            ->setEmail($signUpRequest->getEmail())
            ->setRoles(['ROLE_USER']);

        $user->setPassword($this->hasher->hashPassword($user, $signUpRequest->getPassword()));

        $this->entityManager->persist($user);

        $this->entityManager->flush();

        return $this->successHandler->handleAuthenticationSuccess($user);
    }
}
