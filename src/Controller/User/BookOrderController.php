<?php

namespace App\Controller\User;

use App\Attribute\RequestBody;
use App\Command\User\BookOrder\UpdateBookOrderInterface;
use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;
use App\Model\Error\ErrorResponse;
use App\Model\User\BookOrderRequest;
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
        private readonly UpdateBookOrderInterface $updateBookOrder,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return book order',
        content: new Model(type: BookOrderFullDetailsResponse::class)
    )]
    #[Route('/api/v1/orders/{id}/view', methods: ['GET'])]
    public function view(int $id): Response
    {
        return $this->json($this->bookOrderQuery->getFullOrderDetailsById($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Return book order',
        content: new Model(type: BookOrderFullDetailsResponse::class)
    )]
    #[Route('/api/v1/orders/{id}/edit', methods: ['GET'])]
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
        content: new Model(type: BookOrderRequest::class)
    )]
    #[Route('/api/v1/orders/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] BookOrderRequest $request, int $id): Response
    {
        $this->updateBookOrder->handle($request, $id);

        return $this->json(['message' => 'Book order successfully updated']);
    }
}
