<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Payment\component\NTQPAYRQZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class DirectPaymentResponse
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 直接支付
 * @version 5.37.0 - 3.6
 */
class DirectPaymentResponse extends BaseResponse
{
    /**
     * @var NTQPAYRQZComponent[]
     */
    protected $paymentResultInfo = [];

    /**
     * @return NTQPAYRQZComponent[]
     */
    public function getPaymentResultInfo(): array
    {
        return $this->paymentResultInfo;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTQPAYRQZ') {
            $this->paymentResultInfo[] = new NTQPAYRQZComponent($component);
        }
        // else: just ignore
    }
}