<?php

namespace App\Command\Admin\BookFormat;

use App\Model\Admin\BookFormat\BookFormatResponse;

interface EditBookFormatInterface
{
    public function handle(int $id): BookFormatResponse;

}
