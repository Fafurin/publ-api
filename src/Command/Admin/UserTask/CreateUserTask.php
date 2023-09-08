<?php

namespace App\Command\Admin\UserTask;

use App\Entity\Status;
use App\Entity\UserTask;
use App\Model\Admin\UserTask\UserTaskBriefDetailsRequest;
use App\Repository\BookOrderRepository;
use App\Repository\StatusRepository;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class CreateUserTask implements CreateUserTaskInterface
{
    private const STATUS = 'In work';

    public function __construct(
        private readonly UserRepository      $userRepository,
        private readonly StatusRepository $statusRepository,
        private readonly BookOrderRepository $bookOrderRepository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(UserTaskBriefDetailsRequest $request): void
    {
        $order = $this->bookOrderRepository->find($request->getOrderId());

        $user = $this->userRepository->findByName($request->getName());

        $status = $this->setStatusPrePersist();

        $task = (new UserTask())
            ->setTitle($request->getTitle())
            ->setBookOrder($order)
            ->setStatus($status)
            ->setUser($user)
        ;

        $task->getBookOrder()->setUpdatedAt(new DateTimeImmutable());

        $this->em->persist($task);

        $this->em->flush();
    }

    private function setStatusPrePersist(): Status
    {
        if ($this->statusRepository->findByTitle(self::STATUS)) {
            $status = $this->statusRepository->findByTitle(self::STATUS);
        } else {
            $status = (new Status())->setTitle(self::STATUS);
            $this->em->persist($status);
            $this->em->flush();
        }
        return $status;
    }

}
