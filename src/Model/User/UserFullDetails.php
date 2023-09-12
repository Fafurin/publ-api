<?php

namespace App\Model\User;

use App\Model\Admin\UserTask\UserTaskListResponse;

class UserFullDetails
{
    private int $id;

    private string $name;

    private string $email;

    private ?string $phone;

    private ?string $address;

    private ?int $birthdate;

    private ?string $position;

    private string $roles;

    /** @var UserTaskListResponse */
    private UserTaskListResponse $tasks;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getBirthdate(): ?int
    {
        return $this->birthdate;
    }

    public function setBirthdate(?int $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return UserTaskListResponse|null
     */
    public function getTasks(): ?UserTaskListResponse
    {
        return $this->tasks;
    }

    /**
     * @param UserTaskListResponse|null $tasks
     * @return self
     */
    public function setTasks(?UserTaskListResponse $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getRoles(): string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
