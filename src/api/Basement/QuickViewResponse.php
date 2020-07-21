<?php


namespace leqee\CMBFirmBankSDK\api\Basement;


use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class QuickViewResponse
 * @package leqee\CMBFirmBankSDK\api\Basement
 * Used for some check scenarios, only INFO would be cared
 */
class QuickViewResponse extends BaseResponse
{

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        // just ignore them, only INFO needed
    }
}