<?php declare(strict_types=1);

namespace lib\PageObject;

class LoginPage extends AbstractPage
{
    protected string $pageLocator = '#login-form';
    private string $emailField = '#loginform-email';
    private string $passwordField = '#loginform-password';
    private string $submitButton = 'button[type=submit]';
    private string $forgotPasswordButton = 'a[href="/site/restore-password"]';
    private string $emailErrorMessage = ".field-loginform-email .help-block-error";
    private string $passwordErrorMessage = ".field-loginform-password .help-block-error";

    public function setEmail(string $value): self
    {
        $this->acceptanceTester->fillField($this->emailField, $value);
        return $this;
    }

    public function setPassword(string $value): self
    {
        $this->acceptanceTester->fillField($this->passwordField, $value);
        return $this;
    }

    public function clickSubmit(): self
    {
        $this->acceptanceTester->click($this->submitButton);
        return $this;
    }

    public function clickForgotPassword(): self
    {
        $this->acceptanceTester->click($this->forgotPasswordButton);
        return $this;
    }

    public function getEmailErrorMessage(int $timeout = AbstractPage::DEFAULT_TIMEOUT_SECONDS): string
    {
        $this->acceptanceTester->waitForElementVisible($this->emailErrorMessage, $timeout);
        return $this->acceptanceTester->grabTextFrom($this->emailErrorMessage);
    }

    public function getPasswordErrorMessage(int $timeout = AbstractPage::DEFAULT_TIMEOUT_SECONDS): string
    {
        $this->acceptanceTester->waitForElementVisible($this->passwordErrorMessage, $timeout);
        return $this->acceptanceTester->grabTextFrom($this->passwordErrorMessage);
    }
}