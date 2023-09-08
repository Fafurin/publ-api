<?php

namespace App\Model\Admin\BookType;

class BookTypeListResponse
{

    /**
     * @param BookTypeResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return BookTypeResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
