<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Payment\component\NTPAYQYBZ1Component;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetRefundInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 支付退票明细查询
 * @version 5.37.0 - 3.12
 */
class GetRefundInfoResponse extends BaseResponse
{
    /**
     * @var NTPAYQYBZ1Component[]
     */
    protected $refundInfoList = [];

    /**
     * @return NTPAYQYBZ1Component[]
     */
    public function getRefundInfoList(): array
    {
        return $this->refundInfoList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTQPAYRQZ'){
            $this->refundInfoList[]=new NTPAYQYBZ1Component($component);
        }
        // else: just ignore
    }
}