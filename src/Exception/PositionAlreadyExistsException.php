<?php

namespace App\Exception;

use RuntimeException;

class PositionAlreadyExistsException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("User's position with the title already exists");
    }
}