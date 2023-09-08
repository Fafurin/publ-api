<?php

namespace App\Query\Admin\Position;

use App\Model\Admin\Position\PositionListResponse;

interface PositionQueryInterface
{
    public function handle(): PositionListResponse;

}
