<?php

namespace lib\Service;

class NavigationService extends AbstractService
{
    public const TEST_SITE_URL = 'https://stellantis.autocrm.ru/';
    public const DEFAULT_OPEN_SITE_TIMEOUT_SECONDS = 10;

    public function openSite(
        string $url = NavigationService::TEST_SITE_URL,
        int $timeout = self::DEFAULT_OPEN_SITE_TIMEOUT_SECONDS,
    ): self {
        $this->acceptanceTester->executeJs("window.location.href = '" . $url . "';");
        $this->acceptanceTester->waitForJs('return document.readyState === "complete"', $timeout);
        return $this;
    }

    public function openPage(string $url): self
    {
        $this->acceptanceTester->amOnPage($url);
        return $this;
    }
}