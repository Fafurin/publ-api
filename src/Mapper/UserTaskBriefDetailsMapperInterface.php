<?php

namespace App\Mapper;

use App\Model\Admin\UserTask\UserTaskListResponse;

interface UserTaskBriefDetailsMapperInterface
{
    public function map(array $tasks): UserTaskListResponse;
}