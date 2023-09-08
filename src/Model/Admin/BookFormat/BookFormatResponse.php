<?php

namespace App\Model\Admin\BookFormat;

use App\Traits\Id;
use App\Traits\Title;

class BookFormatResponse
{

    use Id;
    use Title;

    private string $designation;

    public function getDesignation(): string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

}
