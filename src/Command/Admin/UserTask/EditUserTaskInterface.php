<?php

namespace App\Command\Admin\UserTask;

use App\Model\Admin\UserTask\UserTaskBriefDetailsResponse;

interface EditUserTaskInterface
{
    public function handle(int $id): UserTaskBriefDetailsResponse;

}