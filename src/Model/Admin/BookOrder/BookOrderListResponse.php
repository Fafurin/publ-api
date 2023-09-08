<?php

namespace App\Model\Admin\BookOrder;

class BookOrderListResponse
{

    /**
     * @param BookOrderFullDetailsResponse|BookOrderBriefDetailsResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return BookOrderFullDetailsResponse|BookOrderBriefDetailsResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
