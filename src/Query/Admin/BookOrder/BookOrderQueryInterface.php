<?php

namespace App\Query\Admin\BookOrder;

use App\Model\Admin\BookOrder\BookOrderFullDetailsResponse;
use App\Model\Admin\BookOrder\BookOrderListResponse;

interface BookOrderQueryInterface
{
    public function getAllOrdersSortedByUpdatedAt(): BookOrderListResponse;

    public function getFullOrderDetailsById(int $id): BookOrderFullDetailsResponse;

}