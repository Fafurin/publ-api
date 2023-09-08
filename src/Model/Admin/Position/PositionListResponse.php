<?php

namespace App\Model\Admin\Position;

class PositionListResponse
{
    /**
     * @param PositionResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return PositionResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
