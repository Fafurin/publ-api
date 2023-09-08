<?php

namespace App\Command\Admin\UserTask;

use App\Model\Admin\UserTask\UserTaskBriefDetailsRequest;

interface UpdateUserTaskInterface
{
    public function handle(UserTaskBriefDetailsRequest $request, int $id): void;

}