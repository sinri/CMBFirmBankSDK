<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\DCOPDPAYXComponent;
use leqee\CMBFirmBankSDK\api\Payment\component\SDKPAYRQXComponent;

/**
 * Class DirectPaymentRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 直接支付
 * @version 5.37.0 - 3.6
 */
class DirectPaymentRequest extends BaseRequest
{
    /**
     * DirectPaymentRequest constructor.
     * @param string $loginName
     * @param string $businessCode
     * @param string $businessMode
     */
    public function __construct(string $loginName, string $businessCode, string $businessMode='00001')
    {
        parent::__construct($loginName, 'DCPAYMNT');
        $payRequest = new SDKPAYRQXComponent($businessMode);
        $payRequest->BUSCOD = $businessCode;
        $this->appendComponent($payRequest);
    }

    /**
     * @note 支付输入明细不超过 30 条，支付输出有 NTQPAYRQZ 数据;超过 30 条(30..1500)，则无
     * @param DCOPDPAYXComponent $payDetail
     * @return DirectPaymentRequest
    */
    public function addPayDetail(DCOPDPAYXComponent $payDetail){
        $this->appendComponent($payDetail);
        return $this;
    }
}