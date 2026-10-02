<?php declare(strict_types=1);

namespace lib\Service\Api;

use lib\Object\User;
use lib\Service\AbstractService;

class ApiUserService extends AbstractService
{
    public function createUser(User $user): void
    {
        $this->acceptanceTester->sendPost('/user/create', json_encode([
            'email'    => $user->email,
            'password' => password_hash($user->password, PASSWORD_BCRYPT),
        ]));
        $this->acceptanceTester->seeResponseCodeIs(201);

    }
}