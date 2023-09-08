<?php

namespace App\Service;

use App\Repository\StatusRepository;
use App\Repository\UserTaskRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class UserTaskService
{

    private const COMPLETED_STATUS = "Completed";

    private const RESPONSE = "Task completed";

    public function __construct(
        private readonly UserTaskRepository $userTaskRepository,
        private readonly StatusRepository $statusRepository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function completeTask(int $id): string
    {
        $status = $this->statusRepository->findByTitle(self::COMPLETED_STATUS);
        $task = $this->userTaskRepository->find($id);
        $task->setStatus($status);
        $task->setUpdatedAt(new DateTimeImmutable());
        $task->setFinishedAt(new DateTimeImmutable());
        $this->em->flush();

        return self::RESPONSE;
    }

}
