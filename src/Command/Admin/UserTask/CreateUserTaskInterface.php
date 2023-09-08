<?php

namespace App\Command\Admin\UserTask;

use App\Model\Admin\UserTask\UserTaskBriefDetailsRequest;

interface CreateUserTaskInterface
{
    public function handle(UserTaskBriefDetailsRequest $request): void;
}