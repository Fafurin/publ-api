<?php

namespace App\Exception;

use RuntimeException;

class BookTypeAlreadyExistsException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Book type with the title already exists");
    }
}