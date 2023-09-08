<?php

namespace App\Command\Admin\User;

use App\Model\Admin\User\SignUpRequest;
use Symfony\Component\HttpFoundation\Response;

interface CreateUserInterface
{
    public function handle(SignUpRequest $signUpRequest): Response;

}
