<?php

namespace App\Mapper;

use App\Entity\Book;
use App\Model\Admin\Book\BookFullDetailsResponse;

interface BookFullDetailsMapperInterface
{
    public function map(Book $book): BookFullDetailsResponse;
}