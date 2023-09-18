<?php

namespace App\Controller\Admin;

use App\Model\Admin\Book\BookFullDetailsResponse;
use App\Model\Admin\Book\BookListResponse;
use App\Service\SearchService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    public function __construct(
        private readonly SearchService $service,
    ) {
    }

    #[OA\Response(
        response: 200,
        description: 'Return book by search query',
        content: new Model(type: BookListResponse::class)
    )]
    #[Route('/api/v1/admin/search/{searchQuery}', methods: ['GET'])]
    public function search(string $searchQuery): Response
    {
        return $this->json($this->service->search($searchQuery));
    }
}
