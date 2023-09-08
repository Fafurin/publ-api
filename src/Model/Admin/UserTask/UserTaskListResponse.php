<?php

namespace App\Model\Admin\UserTask;

class UserTaskListResponse
{

    /**
     * @param UserTaskFullDetailsResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return UserTaskFullDetailsResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
