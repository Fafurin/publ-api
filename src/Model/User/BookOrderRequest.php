<?php

namespace App\Model\User;

use App\Traits\TitleRequest;

class BookOrderRequest
{
    use TitleRequest;

    private ?array $authors;

    private ?int $circulation;

    private ?string $isbn;

    private ?string $description;

    private ?string $publicationDate;

    private ?float $convPrintSheets;

    private ?float $publSheets;

    private ?int $number;

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

}
