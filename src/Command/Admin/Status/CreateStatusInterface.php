<?php

namespace App\Command\Admin\Status;

use App\Model\Admin\Status\StatusRequest;

interface CreateStatusInterface
{
    public function handle(StatusRequest $request): void;

}