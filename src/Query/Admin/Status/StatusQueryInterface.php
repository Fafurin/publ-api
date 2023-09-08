<?php

namespace App\Query\Admin\Status;

use App\Model\Admin\Status\StatusListResponse;

interface StatusQueryInterface
{
    public function handle(): StatusListResponse;

}
