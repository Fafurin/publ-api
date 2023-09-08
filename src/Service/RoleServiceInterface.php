<?php

namespace App\Service;

interface RoleServiceInterface
{
    public function grantAdmin(int $userId): void;

    public function grantModerator(int $userId): void;

}