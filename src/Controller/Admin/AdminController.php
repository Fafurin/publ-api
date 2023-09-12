<?php

namespace App\Controller\Admin;

use App\Model\Error\ErrorResponse;
use App\Service\RoleServiceInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    public function __construct(private readonly RoleServiceInterface $roleService)
    {
    }

    #[OA\Response(
        response: 200,
        description: 'Grants ROLE_MODERATOR to user'
    )]
    #[OA\Response(
        response: 404,
        description: 'User not found',
        content: new Model(type: ErrorResponse::class)
    )]
    #[Route('/api/v1/admin/grantModerator/{userId}', methods: ['POST'])]
    public function grantModerator(int $userId): Response
    {
        $this->roleService->grantModerator($userId);

        return $this->json('Ok!');
    }
}
