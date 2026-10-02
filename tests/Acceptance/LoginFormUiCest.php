<?php declare(strict_types=1);

namespace tests\Acceptance;

use lib\Object\User;
use lib\PageObject\LoginPage;
use lib\PageObject\RestorePasswordPage;
use lib\Service\Api\ApiUserService;
use lib\Service\Db\DbUserService;
use lib\Service\Ui\UiLoginService;
use lib\Service\Ui\UiNavigationService;
use PHPUnit\Framework\Assert;
use Tests\Support\AcceptanceTester;

class LoginFormUiCest extends BaseUiCest
{
    private UiLoginService $loginService;
    private LoginPage $loginPage;

    public function _before(AcceptanceTester $I): void
    {
        parent::_before($I);
        $this->loginService = new UiLoginService($I);
        $this->loginPage = new LoginPage($I);
        (new UiNavigationService($I))->openSite();
    }

    // This test is private because actually we're not connected to API or DB and can't create user.
    private function checkCorrectLogin(AcceptanceTester $I): void
    {
        $user = new User('valid_user@example.com', '1q@W3e');
        // Create user in system:
        //(new DbUserService($I))->createUser($user);
        // OR
        //(new ApiUserService($I))->createUser($user);
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

    public function checkMaskedPassword(AcceptanceTester $I): void
    {
        $user = new User('user@example.com', '1q2w3e');
        $this->loginService->login($user);
        Assert::assertEquals('password', $this->loginPage->getPasswordFieldTypeAttributre());
    }

    public function checkForgotPasswordLink(AcceptanceTester $I): void
    {
        $this->loginPage->waitForPageToLoad();
        $this->loginPage->clickForgotPassword();
        $restorePasswordPage = new RestorePasswordPage($I);
        $restorePasswordPage->waitForPageToLoad();
    }
}