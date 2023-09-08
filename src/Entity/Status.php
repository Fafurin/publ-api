<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
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
     * @var Collection<BookOrder>
     */
    #[ORM\OneToMany(mappedBy: "status", targetEntity: BookOrder::class)]
    private Collection $bookOrders;

    /**
     * @var Collection<UserTask>
     */
    #[ORM\OneToMany(mappedBy: "status", targetEntity: UserTask::class)]
    private Collection $userTasks;

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
     * @return Collection<BookOrder>
     */
    public function getBookOrders(): Collection
    {
        return $this->bookOrders;
    }

    /**
     * @param Collection<BookOrder> $bookOrders
     * return self
     */
    public function setBookOrders(Collection $bookOrders): self
    {
        $this->bookOrders = $bookOrders;

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
