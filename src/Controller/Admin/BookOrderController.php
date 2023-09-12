<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\BookOrder\CreateBookOrderInterface;
use App\Command\Admin\BookOrder\UpdateBookOrderInterface;
use App\Model\Admin\BookOrder\BookOrderBriefDetailsRequest;
use App\Model\Admin\BookOrder\BookOrderFullDetailsRequest;
use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;
use App\Model\Admin\BookOrder\BookOrderListResponse;
use App\Model\Error\ErrorResponse;
use App\Query\Admin\BookOrder\BookOrderQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookOrderController extends AbstractController
{
    public function __construct(
        private readonly BookOrderQueryInterface $bookOrderQuery,
        private readonly CreateBookOrderInterface $createBookOrder,
        private readonly UpdateBookOrderInterface $updateBookOrder,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return all book orders',
        content: new Model(type: BookOrderListResponse::class)
    )]
    #[Route('/api/v1/admin/orders', methods: ['GET'])]
    public function bookOrders(): Response
    {
        return $this->json($this->bookOrderQuery->getAllOrdersSortedByUpdatedAt());
    }

    #[OA\Response(
        response: 200,
        description: 'Book order added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: BookOrderBriefDetailsRequest::class)
    )]
    #[Route('/api/v1/admin/order/create', methods: ['POST'])]
    public function create(#[RequestBody] BookOrderBriefDetailsRequest $request): Response
    {
        $id = $this->createBookOrder->handle($request);

        return $this->json([
            'message' => 'Order successfully saved to db',
            'id' => $id,
        ]);
    }

    #[OA\Response(
        response: 200,
        description: 'Return book order',
        content: new Model(type: BookOrderFullDetailsResponse::class)
    )]
    #[Route('/api/v1/admin/orders/{id}/view', methods: ['GET'])]
    public function view(int $id): Response
    {
        return $this->json($this->bookOrderQuery->getFullOrderDetailsById($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Return book order',
        content: new Model(type: BookOrderFullDetailsResponse::class)
    )]
    #[Route('/api/v1/admin/orders/{id}/edit', methods: ['GET'])]
    public function edit(int $id): Response
    {
        return $this->json($this->bookOrderQuery->getFullOrderDetailsById($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Book order updated'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: BookOrderBriefDetailsRequest::class)
    )]
    #[Route('/api/v1/admin/orders/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] BookOrderFullDetailsRequest $request, int $id): Response
    {
        $this->updateBookOrder->handle($request, $id);

        return $this->json(['message' => 'Book order successfully updated']);
    }
}
