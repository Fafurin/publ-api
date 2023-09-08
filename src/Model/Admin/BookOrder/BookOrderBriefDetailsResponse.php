<?php

namespace App\Model\Admin\BookOrder;

use App\Model\Admin\Book\BookBriefDetailsResponse;
use App\Traits\Id;

class BookOrderBriefDetailsResponse
{

    use Id;

    private ?int $number;

    private string $status;

    private ?int $createdAt;

    private ?int $updatedAt;

    private ?int $tasksCount;

    private BookBriefDetailsResponse $book;

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

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

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

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

    public function getBook(): BookBriefDetailsResponse
    {
        return $this->book;
    }

    public function setBook(BookBriefDetailsResponse $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getTasksCount(): ?int
    {
        return $this->tasksCount;
    }

    public function setTasksCount(?int $tasksCount): self
    {
        $this->tasksCount = $tasksCount;

        return $this;
    }

}
