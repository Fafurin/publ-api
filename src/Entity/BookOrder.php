<?php

namespace App\Entity;

use App\Repository\BookOrderRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: BookOrderRepository::class)]
class BookOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $number = null;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'book_order')]
    #[ORM\JoinColumn(nullable: false)]
    private Customer $customer;

    #[ORM\OneToOne(targetEntity: Book::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Book $book;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeInterface $updatedAt;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeInterface $finishedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deadline = null;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    private Status $status;

    /**
     * @var Collection<UserTask>
     */
    #[ORM\OneToMany(mappedBy: 'bookOrder', targetEntity: UserTask::class)]
    private Collection $userTasks;

    public function __construct()
    {
        $this->userTasks = new ArrayCollection();
    }

    #[ORM\PrePersist]
    public function setStartedAtValue(): void
    {
        $this->createdAt = new DateTimeImmutable();
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

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getFinishedAt(): ?DateTimeInterface
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(?DateTimeInterface $finishedAt): self
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

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<UserTask>
     */
    public function getUserTasks(): Collection
    {
        return $this->userTasks;
    }

    /**
     * @param Collection<UserTask> $userTasks
     * return self
     */
    public function setUserTasks(Collection $userTasks): self
    {
        $this->userTasks = $userTasks;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return self
     */
    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * @param Book $book
     * @return self
     */
    public function setBook(Book $book): self
    {
        $this->book = $book;

        return $this;
    }

}
