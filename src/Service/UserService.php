<?php

namespace App\Service;

use App\Entity\UserTask;
use App\Mapper\BookFullDetailsMapper;
use App\Mapper\BookOrderFullDetailsMapper;
use App\Model\User\UserFullDetails;
use App\Model\User\UserTaskDetails;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;

class UserService
{
    public function __construct(
        private readonly UserRepository             $userRepository,
        private readonly Security                   $security,
        private readonly BookOrderFullDetailsMapper $bookOrderFullDetailsMapper,
        private readonly BookFullDetailsMapper      $bookFullDetailsMapper,
    ) {
    }

    public function getUserWorkroom(): UserFullDetails
    {
        $user = $this->userRepository->findByEmail($this->security->getUser()->getUserIdentifier());

        $tasks = $user->getTasks()->map(
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
                )
        );
        return (new UserFullDetails())
            ->setId($user->getId())
            ->setName($user->getName())
            ->setEmail($user->getEmail())
//            ->setAddress($user->getProfile()->getAddress())
//            ->setBirthdate($user->getProfile()->getBirthdate()?->getTimestamp())
            ->setPhone($user->getProfile()?->getPhone())
            ->setPosition($user->getPosition()?->getTitle())
            ->setRoles(implode($user->getRoles()))
            ->setTasks([$tasks]);
    }

}
