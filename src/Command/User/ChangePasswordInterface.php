<?php

namespace App\Command\User;

use App\Model\User\ChangePasswordRequest;

interface ChangePasswordInterface
{
    public function handle(ChangePasswordRequest $request): string;

}