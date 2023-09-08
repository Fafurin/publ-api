<?php

namespace App\Command\Admin\BookOrder;

use App\Model\Admin\BookOrder\BookOrderBriefDetailsRequest;

interface CreateBookOrderInterface
{
    public function handle(BookOrderBriefDetailsRequest $request): int;

}