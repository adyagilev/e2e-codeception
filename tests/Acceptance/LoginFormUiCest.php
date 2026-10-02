<?php declare(strict_types=1);

namespace tests\Acceptance;

use lib\PageObject\LoginPage;
use lib\PageObject\RestorePasswordPage;
use lib\Service\LoginService;
use lib\Service\NavigationService;
use PHPUnit\Framework\Assert;
use Tests\Support\AcceptanceTester;
use lib\Object\User;

class LoginFormUiCest extends BaseUiCest
{
    private LoginService $loginService;
    private LoginPage $loginPage;

    public function _before(AcceptanceTester $I): void
    {
        parent::_before($I);
        $this->loginService = new LoginService($I);
        $this->loginPage = new LoginPage($I);
        (new NavigationService($I))->openSite();
    }

    // This test is private because it's incomplete: we can't actually log in. Real credentials required.
    private function checkCorrectLogin(AcceptanceTester $I): void
    {
        $user = new User('valid_user@example.com', '1q@W3e');
        // Create user or use valid credentials
        $this->loginService->login($user);
        // What do we expect here?
    }

    public function checkLoginIncorrectCredentials(AcceptanceTester $I): void
    {
        $user = new User('invalid_user@example.com', '1q2w3e');
        $this->loginService->login($user);
        Assert::assertStringContainsString('Incorrect email', $this->loginPage->getPasswordErrorMessage());
    }

    public function checkLoginBlankFields(AcceptanceTester $I): void
    {
        $user = new User('', '');
        $this->loginService->login($user);
        Assert::assertStringContainsString('cannot be blank', $this->loginPage->getEmailErrorMessage());
        Assert::assertStringContainsString('cannot be blank', $this->loginPage->getPasswordErrorMessage());
    }

    public function checkForgotPasswordLink(AcceptanceTester $I): void
    {
        $this->loginPage->waitForPageToLoad();
        $this->loginPage->clickForgotPassword();
        $restorePasswordPage = new RestorePasswordPage($I);
        $restorePasswordPage->waitForPageToLoad();
    }
}