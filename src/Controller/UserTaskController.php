<?php

namespace App\Controller;

use App\Model\User\UserFullDetails;
use App\Query\Admin\UserTask\UserTaskQueryInterface;
use App\Service\UserTaskService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class UserTaskController extends AbstractController
{
    public function __construct(
        private readonly UserTaskService $service,
        private readonly UserTaskQueryInterface $userTaskQuery
    ) {
    }

    #[Route('/api/v1/task/{id}/complete', methods: ['GET'])]
    public function taskComplete(int $id): Response
    {
        return $this->json($this->service->completeTask($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Return workroom of the current user',
        content: new Model(type: UserFullDetails::class)
    )]
    #[Route('/api/v1/user/tasks', methods: ['GET'])]
    public function tasks(): Response
    {
        return $this->json($this->userTaskQuery->getUserTasks());
    }
}
