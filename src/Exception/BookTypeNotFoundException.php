<?php

namespace App\Exception;

use RuntimeException;

class BookTypeNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Book type not found");
    }
}