<?php

namespace App\Command\User\Profile;

use App\Entity\Profile;
use App\Entity\User;
use App\Model\User\ProfileRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;

class UpdateProfile implements UpdateProfileInterface
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly Security $security,
    ) {
    }

    public function handle(ProfileRequest $request): void
    {
        /** @var User $user */
        $user = $this->security->getUser();

        if (null !== $request->getEmail()) {
            $user->setEmail($request->getEmail());
        }

        $profile = new Profile();

        if (null !== $request->getPhone()) {
            $profile->setPhone($request->getPhone());
        }
        if (null !== $request->getAddress()) {
            $profile->setAddress($request->getAddress());
        }

        $this->em->persist($profile);

        $user->setProfile($profile);

        $this->em->flush();
    }
}
