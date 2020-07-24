<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Payment\component\NTQPAYQYZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetPaymentInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 批量查询支付信息
 * @version 5.37.0 - 3.9
 */
class GetPaymentInfoResponse extends BaseResponse
{
    /**
     * @var NTQPAYQYZComponent[]
     */
    protected $paymentInfoList;

    /**
     * @return NTQPAYQYZComponent[]
     */
    public function getPaymentInfoList(): array
    {
        return $this->paymentInfoList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTQPAYQYZ'){
            $this->paymentInfoList[]=new NTQPAYQYZComponent($component);
        }
        // else: just ignore
    }
}