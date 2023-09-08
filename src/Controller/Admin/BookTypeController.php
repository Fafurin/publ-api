<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\BookType\CreateBookTypeInterface;
use App\Command\Admin\BookType\DeleteBookTypeInterface;
use App\Command\Admin\BookType\EditBookTypeInterface;
use App\Command\Admin\BookType\UpdateBookTypeInterface;
use App\Model\Admin\BookType\BookTypeListResponse;
use App\Model\Admin\BookType\BookTypeRequest;
use App\Model\Admin\BookType\BookTypeResponse;
use App\Model\Error\ErrorResponse;
use App\Query\Admin\BookType\BookTypeQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookTypeController extends AbstractController
{

    public function __construct(
        private readonly BookTypeQueryInterface  $getBookTypes,
        private readonly CreateBookTypeInterface $createBookType,
        private readonly EditBookTypeInterface   $editBookType,
        private readonly UpdateBookTypeInterface $updateBookType,
        private readonly DeleteBookTypeInterface $deleteBookType,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return book types',
        content: new Model(type: BookTypeListResponse::class)
    )]
    #[Route('/api/v1/admin/book/types', methods: ['GET'])]
    public function types(): Response
    {
        return $this->json($this->getBookTypes->handle());
    }

    #[OA\Response(
        response: 200,
        description: 'Book type added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: BookTypeRequest::class)
    )]
    #[Route('/api/v1/admin/book/types/create', methods: ['POST'])]
    public function create(#[RequestBody] BookTypeRequest $request): Response
    {
        $this->createBookType->handle($request);

        return $this->json(['message' => 'Book type successfully saved to db']);
    }

    #[OA\Response(
        response: 200,
        description: 'Return book type',
        content: new Model(type: BookTypeResponse::class)
    )]
    #[Route('/api/v1/admin/book/types/{id}/edit', methods: ['GET'])]
    public function edit(int $id): Response
    {
        return $this->json($this->editBookType->handle($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Book type updated'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: BookTypeRequest::class)
    )]
    #[Route('/api/v1/admin/book/types/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] BookTypeRequest $request, int $id): Response
    {
        $this->updateBookType->handle($request, $id);

        return $this->json(['message' => 'Book type successfully updated']);
    }

    #[OA\Response(
        response: 200,
        description: 'Book type deleted'
    )]
    #[Route('/api/v1/admin/book/types/{id}/delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $this->deleteBookType->handle($id);

        return $this->json(['message' => 'Book type successfully deleted']);
    }

}
