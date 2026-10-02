<?php declare(strict_types=1);

namespace lib\Service\Db;

use lib\Object\User;
use lib\Service\AbstractService;

class DbUserService extends AbstractService
{
    public function createUser(User $user): void
    {
        $data = [
            'email'    => $user->email,
            'password' => password_hash($user->password, PASSWORD_BCRYPT),
        ];

        $this->acceptanceTester->haveInDatabase('users', $data);
    }
}