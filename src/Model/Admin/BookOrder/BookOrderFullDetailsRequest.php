<?php

namespace App\Model\Admin\BookOrder;

use App\Traits\TitleRequest;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookOrderFullDetailsRequest
{
    use TitleRequest;

    private ?array $authors;

    private ?int $circulation;

    private ?string $isbn;

    private ?string $description;

    #[NotBlank]
    private string $format;

    #[NotBlank]
    private string $type;

    private ?string $publicationDate;

    private ?float $convPrintSheets;

    private ?float $publSheets;

    private ?int $number;

    private ?string $deadline;

    private ?string $status;

    private ?string $createdAt;

    private ?string $updatedAt;

    private ?string $finishedAt;

    #[NotBlank]
    private string $name;

    #[NotBlank]
    private string $phone;

    #[Email]
    #[NotBlank]
    private string $email;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAuthors(): ?array
    {
        return $this->authors;
    }

    public function setAuthors(?array $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getCirculation(): ?int
    {
        return $this->circulation;
    }

    public function setCirculation(?int $circulation): self
    {
        $this->circulation = $circulation;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

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

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPublicationDate(): ?string
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?string $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getConvPrintSheets(): ?float
    {
        return $this->convPrintSheets;
    }

    public function setConvPrintSheets(?float $convPrintSheets): self
    {
        $this->convPrintSheets = $convPrintSheets;

        return $this;
    }

    public function getPublSheets(): ?float
    {
        return $this->publSheets;
    }

    public function setPublSheets(?float $publSheets): self
    {
        $this->publSheets = $publSheets;

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

    public function getDeadline(): ?string
    {
        return $this->deadline;
    }

    public function setDeadline(?string $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFinishedAt(): ?string
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(?string $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

}
