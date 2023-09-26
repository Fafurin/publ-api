<?php

namespace App\Controller\User;

use App\Attribute\RequestBody;
use App\Command\User\ChangePasswordInterface;
use App\Command\User\Profile\UpdateProfileInterface;
use App\Model\Error\ErrorResponse;
use App\Model\User\ChangePasswordRequest;
use App\Model\User\ProfileRequest;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(
        private readonly UpdateProfileInterface $createProfile,
        private readonly ChangePasswordInterface $changePassword,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'User password has been changed'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: ChangePasswordRequest::class)
    )]
    #[Route('/api/v1/user/password/change', methods: ['POST'])]
    public function changePassword(#[RequestBody] ChangePasswordRequest $request): Response
    {
        return $this->json([
            'message' => $this->changePassword->handle($request),
        ]);
    }

    #[OA\Response(
        response: 200,
        description: 'User profile added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: ProfileRequest::class)
    )]
    #[Route('/api/v1/user/profile/update', methods: ['POST'])]
    public function updateProfile(#[RequestBody] ProfileRequest $request): Response
    {
        $this->createProfile->handle($request);

        return $this->json(['message' => 'User profile added to the database']);
    }
}
