<?php

namespace App\Model\Admin\UserTask;

use App\Model\User\UserTaskDetails;

class UserTaskListResponse
{
    /**
     * @param UserTaskFullDetailsResponse[]|UserTaskDetails[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return UserTaskFullDetailsResponse[]|UserTaskDetails[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
