<?php

namespace App\Command\Admin\BookType;

use App\Model\Admin\BookType\BookTypeResponse;

interface EditBookTypeInterface
{
    public function handle(int $id): BookTypeResponse;

}