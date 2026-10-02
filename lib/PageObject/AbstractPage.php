<?php declare(strict_types=1);

namespace lib\PageObject;

use Tests\Support\AcceptanceTester;

abstract class AbstractPage
{
    public const DEFAULT_TIMEOUT_SECONDS = 10;
    protected string $pageLocator = '#main';
    protected AcceptanceTester $acceptanceTester;

    public function __construct(AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    public function waitForPageToLoad(int $timeout = AbstractPage::DEFAULT_TIMEOUT_SECONDS): AbstractPage
    {
        $this->acceptanceTester->waitForElement($this->pageLocator, $timeout);
        return $this;
    }
}
