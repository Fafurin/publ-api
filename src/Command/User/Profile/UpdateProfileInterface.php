<?php

namespace App\Command\User\Profile;

use App\Model\User\ProfileRequest;

interface UpdateProfileInterface
{
    public function handle(ProfileRequest $request): void;

}