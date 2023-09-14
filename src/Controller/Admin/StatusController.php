<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\Status\CreateStatusInterface;
use App\Command\Admin\Status\DeleteStatusInterface;
use App\Command\Admin\Status\UpdateStatusInterface;
use App\Model\Admin\Status\StatusListResponse;
use App\Model\Admin\Status\StatusRequest;
use App\Model\Error\ErrorResponse;
use App\Query\Admin\Status\StatusQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatusController extends AbstractController
{
    public function __construct(
        private readonly StatusQueryInterface $getStatuses,
        private readonly CreateStatusInterface $createStatus,
        private readonly UpdateStatusInterface $updateStatus,
        private readonly DeleteStatusInterface $deleteStatus
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return statuses',
        content: new Model(type: StatusListResponse::class)
    )]
    #[Route('/api/v1/admin/statuses', methods: ['GET'])]
    public function statuses(): Response
    {
        return $this->json($this->getStatuses->handle());
    }

    #[OA\Response(
        response: 200,
        description: 'Status added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: StatusRequest::class)
    )]
    #[Route('/api/v1/admin/statuses/create', methods: ['POST'])]
    public function create(#[RequestBody] StatusRequest $request): Response
    {
        $this->createStatus->handle($request);

        return $this->json(['message' => 'Status successfully saved to db']);
    }

    #[OA\Response(
        response: 200,
        description: 'Status updated'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: StatusRequest::class)
    )]
    #[Route('/api/v1/admin/statuses/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] StatusRequest $request, int $id): Response
    {
        $this->updateStatus->handle($request, $id);

        return $this->json(['message' => 'Status successfully updated']);
    }

    #[OA\Response(
        response: 200,
        description: 'Status deleted'
    )]
    #[Route('/api/v1/admin/statuses/{id}/delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $this->deleteStatus->handle($id);

        return $this->json(['message' => 'Status successfully deleted']);
    }
}
