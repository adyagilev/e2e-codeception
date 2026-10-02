<?php

namespace lib\Service;

use Tests\Support\AcceptanceTester;

abstract class AbstractService
{
    protected AcceptanceTester $acceptanceTester;

    public function __construct(AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }
}