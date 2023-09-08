<?php

namespace App\Mapper;

use App\Entity\Book;
use App\Model\Admin\Book\BookBriefDetailsResponse;

interface BookBriefDetailsMapperInterface
{
    public function map(Book $book): BookBriefDetailsResponse;
}