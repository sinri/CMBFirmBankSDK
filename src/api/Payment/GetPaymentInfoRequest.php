<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\NTSTLINFXComponent;

/**
 * Class GetPaymentInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 批量查询支付信息
 * @version 5.37.0 - 3.9
 */
class GetPaymentInfoRequest extends BaseRequest
{
    public function __construct(string $loginName)
    {
        parent::__construct($loginName, 'NTSTLINF');
    }

    /**
     * @note 重复次数为1..500
     * @param string $requestNo
     * @return GetPaymentInfoRequest
     */
    public function addQueryComponent(string $requestNo)
    {
        $this->appendComponent(new NTSTLINFXComponent($requestNo));
        return $this;
    }
}