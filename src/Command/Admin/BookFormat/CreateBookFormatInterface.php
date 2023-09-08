<?php

namespace App\Command\Admin\BookFormat;

use App\Model\Admin\BookFormat\BookFormatRequest;

interface CreateBookFormatInterface
{
    public function handle(BookFormatRequest $request): void;

}