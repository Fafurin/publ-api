<?php

namespace App\Command\Admin\BookType;

interface DeleteBookTypeInterface
{
    public function handle(int $id): void;

}