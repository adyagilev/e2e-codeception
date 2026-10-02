<?php declare(strict_types=1);

namespace tests\Acceptance;

use Tests\Support\AcceptanceTester;

// Important: test class names has to be ended with 'Cest' to be interpreted as codeception test cases
class BaseUiCest
{
    public function _before(AcceptanceTester $I): void
    {
        // Code here will be executed before each test function.
    }

    public function _after(AcceptanceTester $I): void
    {
        // Code here will be executed after each test function.
    }

    // All `public` methods will be executed as tests. Sample:
    /**
    public function tryToTest(AcceptanceTester $I): void
    {
        // Write your test content here.
    }
    */
}
