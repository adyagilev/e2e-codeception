<?php declare(strict_types=1);

namespace lib\PageObject;

class RestorePasswordPage extends AbstractPage
{
    protected string $pageLocator = '#reset-form';
    private string $emailField = '#restorepasswordform-email';
    private string $captchaField = '#restorepasswordform-verifycode';
    private string $submitButton = 'button[name="reset-password-button"]';

    public function setEmail(string $value): self
    {
        $this->acceptanceTester->fillField($this->emailField, $value);
        return $this;
    }

    public function setCaptcha(string $value): self
    {
        $this->acceptanceTester->fillField($this->captchaField, $value);
        return $this;
    }

    public function clickSubmit(): self
    {
        $this->acceptanceTester->click($this->submitButton);
        return $this;
    }
}