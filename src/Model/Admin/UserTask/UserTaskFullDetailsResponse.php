<?php

namespace App\Model\Admin\UserTask;

use App\Traits\Title;

class UserTaskFullDetailsResponse
{
    use Title;

    private int $id;

    private string $status;

    private string $userName;

    private ?string $userPosition;

    private ?int $startedAt;

    private ?int $updatedAt;

    private ?int $finishedAt;

    private ?int $orderId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserPosition(): ?string
    {
        return $this->userPosition;
    }

    public function setUserPosition(?string $userPosition): self
    {
        $this->userPosition = $userPosition;

        return $this;
    }

    public function getStartedAt(): ?int
    {
        return $this->startedAt;
    }

    public function setStartedAt(?int $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFinishedAt(): ?int
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(?int $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

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
