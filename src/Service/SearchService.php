<?php

namespace App\Service;

use App\Entity\Book;
use App\Mapper\BookFullDetailsMapperInterface;
use App\Model\Admin\Book\BookListResponse;
use App\Repository\BookRepository;

class SearchService
{
    public function __construct(
        private readonly BookRepository $bookRepository,
        private readonly BookFullDetailsMapperInterface $bookFullDetailsMapper
    ) {
    }

    public function search(string $searchQuery): BookListResponse|string
    {
        $books = $this->bookRepository->findByTitle($searchQuery);

        return new BookListResponse(array_map(
            fn (Book $book) => $this->bookFullDetailsMapper->map($book), $books));

    }
}
