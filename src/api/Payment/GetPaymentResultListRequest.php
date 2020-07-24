<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\NTQRYSTNY1Component;

/**
 * Class GetPaymentResultListRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 支付结果列表查询
 * @version 5.37.0 - 3.3
 */
class GetPaymentResultListRequest extends BaseRequest
{
    /**
     * GetPaymentResultListRequest constructor.
     * @param string $loginName
     * @param NTQRYSTNY1Component $queryComponent
     */
    public function __construct(string $loginName, NTQRYSTNY1Component $queryComponent)
    {
        parent::__construct($loginName, 'NTQRYSTN');
        $this->appendComponent($queryComponent);
    }
}