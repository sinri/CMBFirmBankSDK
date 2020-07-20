<?php


namespace leqee\CMBFirmBankSDK\api\Basement;


abstract class ApiCaller
{
    // TODO

    /**
     * @param BaseRequest $request
     * @return string
     */
    abstract public function callForXML(BaseRequest $request);
}