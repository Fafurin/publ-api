<?php

namespace App\Mapper;

use App\Model\Admin\UserTask\UserTaskListResponse;

interface UserTaskFullDetailsMapperInterface
{
    public function map(array $tasks): UserTaskListResponse;
}