<?php

namespace App\Model\Admin\Book;

class BookListResponse
{

    /**
     * @param BookFullDetailsResponse|BookBriefDetailsResponse[] $items
     */
    public function __construct(private array $items)
    {
    }

    /**
     * @return BookFullDetailsResponse|BookBriefDetailsResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
