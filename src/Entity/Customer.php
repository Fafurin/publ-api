<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 13)]
    private string $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $email = null;

//    /**
//     * @var Collection<BookOrder>
//     */
//    #[ORM\OneToMany(mappedBy: 'customer', targetEntity: BookOrder::class)]
//    private Collection $orders;

    #[ORM\Column(type: Types::BOOLEAN, nullable: true, options: ["default" => "false"])]
    private bool $isDeleted = false;

    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

//    /**
//     * @return Collection<BookOrder>
//     */
//    public function getOrders(): Collection
//    {
//        return $this->orders;
//    }
//
//    /**
//     * @param Collection<BookOrder> $orders
//     */
//    public function setOrders(Collection $orders): void
//    {
//        $this->orders = $orders;
//    }

}
