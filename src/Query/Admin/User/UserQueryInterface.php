<?php

namespace App\Query\Admin\User;

use App\Model\User\UserListResponse;

interface UserQueryInterface
{
    public function getAllUsers(): UserListResponse;

    public function getUserRole(): string;

}