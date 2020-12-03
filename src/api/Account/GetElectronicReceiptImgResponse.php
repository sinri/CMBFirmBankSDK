<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetElectronicReceiptImgResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询电子回单信息(保存图片)
 * @version 5.37.0 - 2.8
 */
class GetElectronicReceiptImgResponse extends BaseResponse
{
    protected function loadOtherComponent(ArkXMLElement $component)
    {
        // Nothing to do, 该接口查询回单信息保存为图片格式
    }
}