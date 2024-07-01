<?php declare(strict_types=1);

namespace Tests\Unit;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;
use PHPUnit\Extensions\Selenium2TestCase;

final class ExampleTest extends TestCase
{
    /**
     * Website's base URL.
     *
     * @var string
     */
    protected $appURL = 'http://localhost:8080';

    /**
     * Selenium Server URL.
     *
     * @var string
     */
    protected $serverUrl = 'http://localhost:4444/wd/hub';

    /**
     * Instance of Selenium RemoteWebDriver.
     *
     * @var RemoteWebDriver
     */
    protected $driver;

    public function setUp(): void
    {
        /*
        $this->setBrowserUrl('http://localhost:8080');
        $this->setBrowser('chrome');
        $this->setDesiredCapabilities([
            'chromeOptions' => [
                'w3c' => false,
            ],
        ]);
        */


        $chromeOptions = new ChromeOptions();
        $chromeOptions->addArguments(['-headless']);

        $desiredCapabilities = DesiredCapabilities::chrome();
        $desiredCapabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);

        $this->driver = RemoteWebDriver::create($this->serverUrl, $desiredCapabilities);
    }

    public function test_example()
    {
        $this->driver->get($this->appURL);
        $this->assertStringContainsString('Welcome to Homepage!', $this->driver->getPageSource());
    }
}