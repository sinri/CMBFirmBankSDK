<?php


namespace leqee\CMBFirmBankSDK\api\Basement;

/**
 * Class ApiCaller
 * @package leqee\CMBFirmBankSDK\api\Basement
 * Notice: implementation would be found in `leqee\CMBFirmBankSDK\client`
 */
abstract class ApiCaller
{
    /**
     * @param BaseRequest $request
     * @return string
     */
    abstract public function callForXML(BaseRequest $request);

    /**
     * @param string $requestXML
     * @return string
     */
    abstract public function sendForXML(string $requestXML);
}