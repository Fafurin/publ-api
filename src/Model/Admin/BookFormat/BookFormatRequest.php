<?php

namespace App\Model\Admin\BookFormat;

use App\Traits\TitleRequest;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookFormatRequest
{
    use TitleRequest;

    #[NotBlank]
    private string $designation;

    public function getDesignation(): string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): void
    {
        $this->designation = $designation;
    }

}
