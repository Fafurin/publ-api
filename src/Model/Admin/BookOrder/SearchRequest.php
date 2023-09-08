<?php

namespace App\Model\Admin\BookOrder;

use Symfony\Component\Validator\Constraints\NotBlank;

class SearchRequest
{

    #[NotBlank]
    private string $searchQuery;

    public function getSearchQuery(): string
    {
        return $this->searchQuery;
    }

    public function setSearchQuery(string $searchQuery): self
    {
        $this->searchQuery = $searchQuery;

        return $this;
    }

}
