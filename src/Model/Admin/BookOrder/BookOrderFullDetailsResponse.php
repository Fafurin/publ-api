<?php

namespace App\Model\Admin\BookOrder;

use App\Model\Admin\Book\BookFullDetailsResponse;
use App\Model\Admin\Customer\CustomerResponse;
use App\Model\Admin\UserTask\UserTaskListResponse;
use App\Traits\Id;

class BookOrderFullDetailsResponse
{

    use Id;

    private CustomerResponse $customer;

    private BookFullDetailsResponse $book;

    private ?int $number;

    private string $status;

    private ?string $deadline;

    private ?int $createdAt;

    private ?int $updatedAt;

    private ?int $finishedAt;

    private UserTaskListResponse $tasks;

    public function getCustomer(): CustomerResponse
    {
        return $this->customer;
    }

    public function setCustomer(CustomerResponse $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getBook(): BookFullDetailsResponse
    {
        return $this->book;
    }

    public function setBook(BookFullDetailsResponse $book): self
    {
        $this->book = $book;

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

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

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

    public function getFinishedAt(): ?int
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(?int $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    public function getDeadline(): ?string
    {
        return $this->deadline;
    }

    public function setDeadline(?string $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getTasks(): UserTaskListResponse
    {
        return $this->tasks;
    }

    public function setTasks(UserTaskListResponse $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }

}
