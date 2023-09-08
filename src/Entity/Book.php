<?php

namespace App\Entity;

use App\Repository\BookRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $title;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $authors = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeInterface $publicationDate = null;

    #[ORM\ManyToOne(targetEntity: BookType::class)]
    private BookType $type;

    #[ORM\ManyToOne(targetEntity: BookFormat::class)]
    private BookFormat $format;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $isbn = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $circulation = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?float $convPrintSheets = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?float $publSheets = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<BookFile>
     */
    #[ORM\OneToMany(mappedBy: 'book', targetEntity: BookFile::class)]
    private Collection $bookFiles;

    public function __construct()
    {
        $this->bookFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setAuthors(array $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getPublicationDate(): ?DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getType(): BookType
    {
        return $this->type;
    }

    public function setType(BookType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFormat(): BookFormat
    {
        return $this->format;
    }

    public function setFormat(BookFormat $format): self
    {
        $this->format = $format;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<BookFile>
     */
    public function getBookFiles(): Collection
    {
        return $this->bookFiles;
    }

    /**
     * @param Collection<BookFile> $bookFiles
     * return self
     */
    public function setBookFiles(Collection $bookFiles): self
    {
        $this->bookFiles = $bookFiles;

        return $this;
    }

}
