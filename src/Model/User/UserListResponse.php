<?php

namespace App\Model\User;

class UserListResponse
{
    /**
     * @var UserListItem[]
     */
    private array $items;

    /**
     * @param UserListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return UserListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}