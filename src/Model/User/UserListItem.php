<?php

namespace App\Model\User;

class UserListItem
{

    private int $id;

    private string $name;

    private ?string $position;

    private ?int $taskCount;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
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

    public function getTaskCount(): ?int
    {
        return $this->taskCount;
    }

    public function setTaskCount(?int $taskCount): self
    {
        $this->taskCount = $taskCount;

        return $this;
    }

}
