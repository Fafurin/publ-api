<?php

namespace App\Model\Admin\BookOrder;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookOrderBriefDetailsRequest
{

    #[NotBlank]
    private string $customerName;

    #[NotBlank]
    private string $customerPhone;

    #[Email]
    #[NotBlank]
    private string $customerEmail;

    #[NotBlank]
    private string $bookTitle;

    #[NotBlank]
    private int $bookTypeId;

    #[NotBlank]
    private int $bookFormatId;

    private ?string $authors;

    private ?string $description;

    private ?string $status;

    private ?string $deadline;

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): self
    {
        $this->customerName = $customerName;

        return $this;
    }

    public function getCustomerPhone(): string
    {
        return $this->customerPhone;
    }

    public function setCustomerPhone(string $customerPhone): self
    {
        $this->customerPhone = $customerPhone;

        return $this;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(string $customerEmail): self
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    public function getBookTitle(): string
    {
        return $this->bookTitle;
    }

    public function setBookTitle(string $bookTitle): self
    {
        $this->bookTitle = $bookTitle;

        return $this;
    }

    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    public function setAuthors(?string $authors): self
    {
        $this->authors = $authors;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBookTypeId(): int
    {
        return $this->bookTypeId;
    }

    public function setBookTypeId(int $bookTypeId): self
    {
        $this->bookTypeId = $bookTypeId;

        return $this;
    }

    public function getBookFormatId(): int
    {
        return $this->bookFormatId;
    }

    public function setBookFormatId(int $bookFormatId): self
    {
        $this->bookFormatId = $bookFormatId;

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

}
