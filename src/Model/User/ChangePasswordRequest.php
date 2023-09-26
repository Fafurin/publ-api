<?php

namespace App\Model\User;

use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChangePasswordRequest
{
    #[NotBlank]
    #[Length(min: 8)]
    private string $password;

    #[NotBlank]
    #[EqualTo(propertyPath: 'password', message: 'This value should be equal to password')]
    private string $confirmPassword;

    #[NotBlank]
    #[Length(min: 8)]
    private string $oldPassword;

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): self
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword): self
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }

}
