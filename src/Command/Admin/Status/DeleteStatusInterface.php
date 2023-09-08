<?php

namespace App\Command\Admin\Status;

interface DeleteStatusInterface
{
    public function handle(int $id): void;

}