<?php


namespace leqee\CMBFirmBankSDK\test\ApiTest;


use leqee\CMBFirmBankSDK\client\HttpWebClient;
use sinri\ark\core\ArkLogger;

class MockedTestEnv
{
    /**
     * @var ArkLogger
     */
    public static $logger;

    /**
     * @return HttpWebClient
     */
    public static function getHttpWebClient()
    {
        return new HttpWebClient('http://localhost:8080', self::getLogger());
    }

    /**
     * @return ArkLogger
     */
    public static function getLogger()
    {
        if (!self::$logger) {
            self::$logger = new ArkLogger(__DIR__ . '/../../log', 'ApiTest');
        }
        return self::$logger;
    }

    /**
     * @return bool
     * If you want run online test when you are on GATEWAY MACHINE,
     * put a file `online.txt` with content `on` in `debug` directory.
     */
    public static function ignoreOnlineTests()
    {
        $switchFile = __DIR__ . '/../../debug/online.txt';
        if (file_exists($switchFile) && 'on' === file_get_contents($switchFile)) {
            return false;
        }
        return true;
    }
}