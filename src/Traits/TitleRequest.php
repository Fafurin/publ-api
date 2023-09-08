<?php

namespace App\Traits;

use Symfony\Component\Validator\Constraints\NotBlank;

trait TitleRequest
{
    #[NotBlank]
    private string $title;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

}