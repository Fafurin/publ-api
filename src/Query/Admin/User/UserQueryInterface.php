<?php

namespace App\Query\Admin\User;

use App\Model\User\UserFullDetails;
use App\Model\User\UserListResponse;

interface UserQueryInterface
{
    public function getAllUsers(): UserListResponse;

    public function getUserInfoById(int $id): UserFullDetails;

    public function getCurrentUserInfo(): UserFullDetails;

}