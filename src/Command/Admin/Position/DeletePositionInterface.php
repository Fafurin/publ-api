<?php

namespace App\Command\Admin\Position;

interface DeletePositionInterface
{
    public function handle(int $id): void;

}