<?php

namespace App\Command\Admin\Position;

use App\Model\Admin\Position\PositionRequest;

interface UpdatePositionInterface
{
    public function handle(PositionRequest $request, int $id): void;

}