<?php

namespace App\Command\Admin\BookType;

use App\Model\Admin\BookType\BookTypeRequest;

interface UpdateBookTypeInterface
{
    public function handle(BookTypeRequest $request, int $id): void;

}