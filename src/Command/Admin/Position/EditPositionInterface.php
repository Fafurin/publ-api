<?php

namespace App\Command\Admin\Position;

use App\Model\Admin\Position\PositionResponse;

interface EditPositionInterface
{
    public function handle(int $id): PositionResponse;

}