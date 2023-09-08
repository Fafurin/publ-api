<?php

namespace App\Model\Admin\UserTask;

use App\Traits\Title;

class UserTaskBriefDetailsResponse
{

    use Title;

    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

}