<?php

namespace App\Mapper;

use App\Entity\Book;
use App\Model\Admin\Book\BookBriefDetailsResponse;

// This mapper is designed to map output book brief information (included in the BookOrderBriefDetailsMapper)
class BookBriefDetailsMapper implements BookBriefDetailsMapperInterface
{
    public function map(Book $book): BookBriefDetailsResponse
    {
        return (new BookBriefDetailsResponse())
            ->setTitle($book->getTitle())
            ->setAuthors($book->getAuthors())
            ->setIsbn($book->getIsbn())
            ->setFormat($book->getFormat()->getTitle())
            ->setType($book->getType()->getTitle())
            ->setCirculation($book->getCirculation());
    }
}
