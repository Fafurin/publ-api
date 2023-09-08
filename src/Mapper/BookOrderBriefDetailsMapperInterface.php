<?php

namespace App\Mapper;

use App\Entity\BookOrder;
use App\Model\Admin\BookOrder\BookOrderBriefDetailsResponse;

interface BookOrderBriefDetailsMapperInterface
{
    public function map(BookOrder $order): BookOrderBriefDetailsResponse;

}
