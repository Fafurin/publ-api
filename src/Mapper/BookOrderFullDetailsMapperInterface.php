<?php

namespace App\Mapper;

use App\Entity\BookOrder;
use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;

interface BookOrderFullDetailsMapperInterface
{
    public function map(BookOrder $bookOrder): BookOrderFullDetailsResponse;

}
