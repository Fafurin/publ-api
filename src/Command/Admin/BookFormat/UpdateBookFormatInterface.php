<?php

namespace App\Command\Admin\BookFormat;

use App\Model\Admin\BookFormat\BookFormatRequest;

interface UpdateBookFormatInterface
{
    public function handle(BookFormatRequest $request, int $id): void;

}
