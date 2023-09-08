<?php

namespace App\Exception;

use RuntimeException;

class BookOrderNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Order not found");
    }
}