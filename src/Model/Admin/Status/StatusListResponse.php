<?php

namespace App\Model\Admin\Status;

class StatusListResponse
{
    /**
     * @param StatusResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return StatusResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
