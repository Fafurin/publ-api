<?php

namespace App\Exception;

use RuntimeException;

class BookFormatAlreadyExistsException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Book format with the title already exists");
    }
}