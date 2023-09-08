<?php

namespace App\Controller;

use App\Model\User\UserFullDetails;
use App\Service\UserService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    public function __construct(private readonly UserService $service)
    {
    }

    #[OA\Response(
        response: 200,
        description: 'Return workroom of the current user',
        content: new Model(type: UserFullDetails::class)
    )]
    #[Route('/api/v1/user/workroom', methods: ['GET'])]
    public function workroom(): Response
    {
        return $this->json($this->service->getUserWorkroom());
    }


}
