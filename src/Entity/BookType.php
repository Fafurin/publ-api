<?php

namespace App\Entity;

use App\Repository\BookTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookTypeRepository::class)]
class BookType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255, unique: true)]
    private string $title;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true, options: ["default" => "false"])]
    private bool $isDeleted = false;

    /**
     * @var Collection<Book>
     */
    #[ORM\OneToMany(mappedBy: "bookType", targetEntity: Book::class)]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    /**
     * @param Collection<Book> $books
     * return self
     */
    public function setBooks(Collection $books): self
    {
        $this->books = $books;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

}
