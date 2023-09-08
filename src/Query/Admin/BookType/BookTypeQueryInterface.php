<?php

namespace App\Query\Admin\BookType;

use App\Model\Admin\BookType\BookTypeListResponse;

interface BookTypeQueryInterface
{
    public function handle(): BookTypeListResponse;

}
