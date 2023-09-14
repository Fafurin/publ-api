<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\Position\CreatePositionInterface;
use App\Command\Admin\Position\DeletePositionInterface;
use App\Command\Admin\Position\UpdatePositionInterface;
use App\Model\Admin\Position\PositionListResponse;
use App\Model\Admin\Position\PositionRequest;
use App\Model\Error\ErrorResponse;
use App\Query\Admin\Position\PositionQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PositionController extends AbstractController
{
    public function __construct(
        private readonly PositionQueryInterface $getPositions,
        private readonly CreatePositionInterface $createPosition,
        private readonly UpdatePositionInterface $updatePosition,
        private readonly DeletePositionInterface $deletePosition
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return positions',
        content: new Model(type: PositionListResponse::class)
    )]
    #[Route('/api/v1/admin/positions', methods: ['GET'])]
    public function positions(): Response
    {
        return $this->json($this->getPositions->handle());
    }

    #[OA\Response(
        response: 200,
        description: 'Position added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: PositionRequest::class)
    )]
    #[Route('/api/v1/admin/positions/create', methods: ['POST'])]
    public function create(#[RequestBody] PositionRequest $request): Response
    {
        $this->createPosition->handle($request);

        return $this->json(['message' => 'Position successfully saved to db']);
    }

    #[OA\Response(
        response: 200,
        description: 'Position updated'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: PositionRequest::class)
    )]
    #[Route('/api/v1/admin/positions/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] PositionRequest $request, int $id): Response
    {
        $this->updatePosition->handle($request, $id);

        return $this->json(['message' => 'Position successfully updated']);
    }

    #[OA\Response(
        response: 200,
        description: 'Position deleted'
    )]
    #[Route('/api/v1/admin/positions/{id}/delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $this->deletePosition->handle($id);

        return $this->json(['message' => 'Position successfully deleted']);
    }
}
