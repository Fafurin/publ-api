<?php

namespace App\Command\Admin\Position;

use App\Model\Admin\Position\PositionRequest;

interface CreatePositionInterface
{
    public function handle(PositionRequest $request): void;

}