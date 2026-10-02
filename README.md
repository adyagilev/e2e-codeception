## Pre-requisites

* PHP 8.4
* Composer
* Docker

## Setup local environment

* Checkout repository
* Run `composer install` to install dependencies
* For UI test you need to run Selenium Server. Be sure that Docker engine is running and run the following command: `docker run --name Selenium --rm -it -p 4444:4444 -p 5900:5900 -p 7900:7900 -e SCREEN_WIDTH=1920 -e SCREEN_HEIGHT=1080 -e VNC_NO_PASSWORD=1 --shm-size 2g selenium/standalone-chrome:latest`
* To see what is going on inside Selenium, open the following URL in your browser: `http://localhost:7900/`

## How to run test case

Use standard `codecept` runner for the tests:
 * `php vendor/bin/codecept run Acceptance --steps`
 * `php vendor/bin/codecept run tests/Acceptance/LoginFormUiCest.php` 

## Base framework structure

 * `lib`
    - `Checker` - product checks & asserts
    - `Object` - test objects, mainly represented corresponding objects in the product
    - `PageObject` - PageObjects that allow to work with UI-parts as separated objects, without product business logic
    - `Service` - API/UI/CLI operations related with product business logic
    - `System` - managers and helpers, that help to run the tests
 * `tests`
    - `Acceptance` - directory for e2e tests. We use this one.
    - `Functional` - empty for now
    - `Unit` - empty for now
    - `Support` - Codeception specific
