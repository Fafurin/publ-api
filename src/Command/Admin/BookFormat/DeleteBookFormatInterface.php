<?php

namespace App\Command\Admin\BookFormat;

interface DeleteBookFormatInterface
{
    public function handle(int $id): void;

}
