<?php

namespace App\Controller\Admin;

use App\Attribute\RequestBody;
use App\Command\Admin\BookFormat\CreateBookFormatInterface;
use App\Command\Admin\BookFormat\DeleteBookFormatInterface;
use App\Command\Admin\BookFormat\EditBookFormatInterface;
use App\Command\Admin\BookFormat\UpdateBookFormatInterface;
use App\Model\Admin\BookFormat\BookFormatListResponse;
use App\Model\Admin\BookFormat\BookFormatRequest;
use App\Model\Admin\BookFormat\BookFormatResponse;
use App\Model\Error\ErrorResponse;
use App\Query\Admin\BookFormat\BookFormatQueryInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookFormatController extends AbstractController
{
    public function __construct(
        private readonly CreateBookFormatInterface $createBookFormat,
        private readonly UpdateBookFormatInterface $updateBookFormat,
        private readonly EditBookFormatInterface $editBookFormat,
        private readonly DeleteBookFormatInterface $deleteBookFormat,
        private readonly BookFormatQueryInterface $getBookFormats
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return book formats',
        content: new Model(type: BookFormatListResponse::class)
    )]
    #[Route('/api/v1/admin/book/formats', methods: ['GET'])]
    public function formats(): Response
    {
        return $this->json($this->getBookFormats->handle());
    }

    #[OA\Response(
        response: 200,
        description: 'Book format added to the database'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: BookFormatRequest::class)
    )]
    #[Route('/api/v1/admin/book/formats/create', methods: ['POST'])]
    public function create(#[RequestBody] BookFormatRequest $request): Response
    {
        $this->createBookFormat->handle($request);

        return $this->json(['message' => 'Book format successfully saved to db']);
    }

    #[OA\Response(
        response: 200,
        description: 'Return book format',
        content: new Model(type: BookFormatResponse::class)
    )]
    #[Route('/api/v1/admin/book/formats/{id}/edit', methods: ['GET'])]
    public function edit(int $id): Response
    {
        return $this->json($this->editBookFormat->handle($id));
    }

    #[OA\Response(
        response: 200,
        description: 'Book format updated'
    )]
    #[OA\Response(
        response: 400,
        description: 'Validation failed',
        content: new Model(type: ErrorResponse::class)
    )]
    #[OA\RequestBody(
        content: new Model(type: BookFormatRequest::class)
    )]
    #[Route('/api/v1/admin/book/formats/{id}/update', methods: ['PUT'])]
    public function update(#[RequestBody] BookFormatRequest $request, int $id): Response
    {
        $this->updateBookFormat->handle($request, $id);

        return $this->json(['message' => 'Book format successfully updated']);
    }

    #[OA\Response(
        response: 200,
        description: 'Book format deleted'
    )]
    #[Route('/api/v1/admin/book/formats/{id}/delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $this->deleteBookFormat->handle($id);

        return $this->json(['message' => 'Book format successfully deleted']);
    }

}
