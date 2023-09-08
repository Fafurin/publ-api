<?php

namespace App\Command\Admin\Status;

use App\Model\Admin\Status\StatusRequest;

interface UpdateStatusInterface
{
    public function handle(StatusRequest $request, int $id): void;

}