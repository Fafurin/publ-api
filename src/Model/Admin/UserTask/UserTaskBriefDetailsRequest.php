<?php

namespace App\Model\Admin\UserTask;

use App\Traits\TitleRequest;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserTaskBriefDetailsRequest
{

    use TitleRequest;

    #[NotBlank]
    private string $name;

    private ?int $orderId;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

}
