<?php

namespace App\Command\Admin\Status;

use App\Model\Admin\Status\StatusResponse;

interface EditStatusInterface
{
    public function handle(int $id): StatusResponse;

}