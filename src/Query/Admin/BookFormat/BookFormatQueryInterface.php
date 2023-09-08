<?php

namespace App\Query\Admin\BookFormat;

use App\Model\Admin\BookFormat\BookFormatListResponse;

interface BookFormatQueryInterface
{
    public function handle(): BookFormatListResponse;

}
