<?php

namespace App\Exception;

use RuntimeException;

class PositionNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Position not found");
    }
}