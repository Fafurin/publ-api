<?php

namespace App\Model\Admin\BookFormat;

class BookFormatListResponse
{

    /**
     * @param BookFormatResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return BookFormatResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
