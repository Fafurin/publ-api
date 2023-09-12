<?php

namespace App\Model\User;

use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;

class UserTaskDetails
{
    private int $id;

    private string $title;

    private ?int $startedAt;

    private ?int $updatedAt;

    private ?int $finishedAt;

    private string $status;

    private BookOrderFullDetailsResponse $order;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getOrder(): BookOrderFullDetailsResponse
    {
        return $this->order;
    }

    public function setOrder(BookOrderFullDetailsResponse $order): self
    {
        $this->order = $order;

        return $this;
    }
}
