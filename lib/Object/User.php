<?php declare(strict_types=1);

namespace lib\Object;

class User
{
    public const DEFAULT_PASSWORD = '1q2w3e';

    public string $email;
    public string $password;

    public function __construct(string $email, string $password = User::DEFAULT_PASSWORD) {
        $this->email = $email;
        $this->password = $password;
    }
}