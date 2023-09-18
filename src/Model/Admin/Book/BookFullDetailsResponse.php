<?php

namespace App\Model\Admin\Book;

use App\Model\Admin\BookFile\BookFileResponse;
use App\Traits\Title;

class BookFullDetailsResponse
{
    use Title;

    /**
     * @var string[]
     */
    private array $authors;

    private ?int $orderId;

    private ?string $isbn;

    private ?int $circulation;

    private ?int $publicationDate;

    private ?float $convPrintSheets;

    private ?float $publSheets;

    private string $type;

    private string $format;

    private ?string $description;

    /**
     * @var BookFileResponse[]
     */
    private ?array $files;

    /**
     * @return string[]
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param string[] $authors
     */
    public function setAuthors(?array $authors): self
    {
        $this->authors = $authors;

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

    public function getPublicationDate(): ?int
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?int $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

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

    public function getCirculation(): ?int
    {
        return $this->circulation;
    }

    public function setCirculation(?int $circulation): self
    {
        $this->circulation = $circulation;

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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    /**
     * @return BookFileResponse[]
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function setFiles(?array $files): self
    {
        $this->files = $files;

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
}
