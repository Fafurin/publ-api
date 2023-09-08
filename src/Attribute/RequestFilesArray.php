<?php

namespace App\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
class RequestFilesArray
{

    public function __construct(private readonly array $files)
    {
    }

    /**
     * @return RequestFile[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }

}