<?php

namespace App\Controller;

use App\Service\UserTaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserTaskController extends AbstractController
{

    public function __construct(private readonly UserTaskService $service)
    {
    }

    #[Route('/api/v1/task/{id}/complete', methods: ['GET'])]
    public function taskComplete(int $id): Response
    {
        return $this->json($this->service->completeTask($id));
    }

}
