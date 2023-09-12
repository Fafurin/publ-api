<?php

namespace App\Query\Admin\UserTask;

use App\Model\Admin\UserTask\UserTaskListResponse;

interface UserTaskQueryInterface
{
    public function getAllTasksByUpdatedAt(): UserTaskListResponse;

    public function getUserTasks(): UserTaskListResponse;

}