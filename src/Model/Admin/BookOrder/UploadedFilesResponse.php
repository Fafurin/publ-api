<?php

namespace App\Model\Admin\BookOrder;

class UploadedFilesResponse
{
    public function __construct(private string $link)
    {
    }

    public function getLink(): string
    {
        return $this->link;
    }

}