<?php

namespace App\Command\Admin\UserTask;

use App\Model\Admin\UserTask\UserTaskBriefDetailsRequest;
use App\Repository\UserRepository;
use App\Repository\UserTaskRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class UpdateUserTask implements UpdateUserTaskInterface
{

    public function __construct(
        private readonly UserRepository      $userRepository,
        private readonly UserTaskRepository $userTaskRepository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(UserTaskBriefDetailsRequest $request, int $id): void
    {
        $task = $this->userTaskRepository->find($id);

        $task->setTitle($request->getTitle())
            ->setUser($this->userRepository->findByName($request->getName()))
            ->setUpdatedAt(new DateTimeImmutable())
        ;

        $task->getBookOrder()->setUpdatedAt(new DateTimeImmutable());

        $this->em->persist($task);
        $this->em->flush();
    }

}
