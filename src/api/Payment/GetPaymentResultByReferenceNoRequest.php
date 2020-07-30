<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\NTQRYSTYX1Component;

/**
 * Class GetPaymentResultByReferenceNoRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 支付结果查询-按业务参考号
 * @version 5.37.0 - 3.11
 */
class GetPaymentResultByReferenceNoRequest extends BaseRequest
{
    /**
     * GetPaymentResultListRequest constructor.
     * @param string $loginName
     * @param NTQRYSTYX1Component $queryComponent
     */
    public function __construct(string $loginName, NTQRYSTYX1Component $queryComponent)
    {
        parent::__construct($loginName, 'NTQRYSTY');
        $this->appendComponent($queryComponent);
    }
}