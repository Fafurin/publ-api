<?php

namespace App\Exception;

use RuntimeException;

class StatusAlreadyExistsException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Status with the title already exists");
    }
}