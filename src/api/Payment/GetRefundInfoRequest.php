<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\NTPAYQYBY1Component;

/**
 * Class GetRefundInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 支付退票明细查询
 * @version 5.37.0 - 3.12
 */
class GetRefundInfoRequest extends BaseRequest
{
    /**
     * GetPaymentResultListRequest constructor.
     * @param string $loginName
     * @param NTPAYQYBY1Component $queryComponent
     */
    public function __construct(string $loginName, NTPAYQYBY1Component $queryComponent)
    {
        parent::__construct($loginName, 'NTPAYQYB');
        $this->appendComponent($queryComponent);
    }
}