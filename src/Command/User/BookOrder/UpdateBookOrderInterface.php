<?php

namespace App\Command\User\BookOrder;

use App\Model\User\BookOrderRequest;

interface UpdateBookOrderInterface
{
    public function handle(BookOrderRequest $request, int $id): void;

}