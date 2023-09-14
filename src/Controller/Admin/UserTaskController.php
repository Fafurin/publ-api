<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\UserTask\CreateUserTaskInterface;
use App\Command\Admin\UserTask\UpdateUserTaskInterface;
use App\Model\Admin\UserTask\UserTaskBriefDetailsRequest;
use App\Model\Admin\UserTask\UserTaskListResponse;
use App\Model\Error\ErrorResponse;
use App\Query\Admin\UserTask\UserTaskQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserTaskController extends AbstractController
{
    public function __construct(
        private readonly UserTaskQueryInterface $userTaskQuery,
        private readonly CreateUserTaskInterface $createUserTask,
        private readonly UpdateUserTaskInterface $updateUserTask,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return tasks',
        content: new Model(type: UserTaskListResponse::class)
    )]
    #[Route('/api/v1/admin/tasks', methods: ['GET'])]
    public function tasks(): Response
    {
        return $this->json($this->userTaskQuery->getAllTasksByUpdatedAt());
    }

    #[OA\Response(
        response: 200,
        description: 'Task added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: UserTaskBriefDetailsRequest::class)
    )]
    #[Route('/api/v1/admin/task/create', methods: ['POST'])]
    public function create(#[RequestBody] UserTaskBriefDetailsRequest $request): Response
    {
        $this->createUserTask->handle($request);

        return $this->json(['message' => 'Task successfully saved to db']);
    }

    #[OA\Response(
        response: 200,
        description: 'Book format updated'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: UserTaskBriefDetailsRequest::class)
    )]
    #[Route('/api/v1/admin/task/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] UserTaskBriefDetailsRequest $request, int $id): Response
    {
        $this->updateUserTask->handle($request, $id);

        return $this->json(['message' => 'User task successfully updated']);
    }
}
