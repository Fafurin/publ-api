<?php

namespace App\Command\Admin\BookOrder;

use App\Model\Admin\BookOrder\BookOrderFullDetailsRequest;

interface UpdateBookOrderInterface
{
    public function handle(BookOrderFullDetailsRequest $request, int $id): void;

}