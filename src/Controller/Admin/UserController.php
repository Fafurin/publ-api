<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\User\CreateUserInterface;
use App\Model\Admin\User\SignUpRequest;
use App\Model\Error\ErrorResponse;
use App\Model\User\UserFullDetails;
use App\Model\User\UserListResponse;
use App\Query\Admin\User\UserQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly CreateUserInterface $createUser,
        private readonly UserQueryInterface $userQuery,
    ) {
    }

    #[Route('/api/v1/auth/signUp', methods: ['POST'])]
    #[OA\Response(
        response: 200,
        description: 'Signs up a user',
        content: new OA\JsonContent(properties: [
            new OA\Property(property: 'token', type: 'string'),
            new OA\Property(property: 'refresh_token', type: 'string')])
    )]
    #[OA\Response(response: 409, description: 'User already exists', attachables: [new Model(type: ErrorResponse::class)])]
    #[OA\Response(response: 400, description: 'Validation failed', attachables: [new Model(type: ErrorResponse::class)])]
    #[OA\RequestBody(attachables: [new Model(type: SignUpRequest::class)])]
    public function signUp(#[RequestBody] SignUpRequest $signUpRequest): Response
    {
        return $this->createUser->handle($signUpRequest);
    }

    #[OA\Response(
        response: 200,
        description: 'Return all users',
        content: new Model(type: UserListResponse::class)
    )]
    #[Route('/api/v1/admin/users', methods: ['GET'])]
    public function users(): Response
    {
        return $this->json($this->userQuery->getAllUsers());
    }

    #[OA\Response(
        response: 200,
        description: 'Returns user info by id',
        content: new Model(type: UserFullDetails::class)
    )]
    #[Route('/api/v1/admin/users/{id}/view', methods: ['GET'])]
    public function view(int $id): Response
    {
        return $this->json($this->userQuery->getUserInfoById($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Returns current user info',
        content: new Model(type: UserFullDetails::class)
    )]
    #[Route('/api/v1/users/current', methods: ['GET'])]
    public function info(): Response
    {
        return $this->json($this->userQuery->getCurrentUserInfo());
    }
}
