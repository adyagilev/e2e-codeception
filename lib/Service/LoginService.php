<?php declare(strict_types=1);

namespace lib\Service;

use lib\Object\User;
use lib\PageObject\LoginPage;

class LoginService extends AbstractService
{
    public function login(User $user): void {
        $page = new LoginPage($this->acceptanceTester);
        $page->waitForPageToLoad();
        $page->setEmail($user->email);
        $page->setPassword($user->password);
        $page->clickSubmit();
    }
}