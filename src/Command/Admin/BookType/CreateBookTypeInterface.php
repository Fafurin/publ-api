<?php

namespace App\Command\Admin\BookType;

use App\Model\Admin\BookType\BookTypeRequest;

interface CreateBookTypeInterface
{
    public function handle(BookTypeRequest $request): void;

}