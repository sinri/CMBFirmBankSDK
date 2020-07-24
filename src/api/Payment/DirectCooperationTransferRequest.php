<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\DCOPRTRFXComponent;
use leqee\CMBFirmBankSDK\api\Payment\component\SDKPAYRQXComponent;

/**
 * Class DirectCooperationTransferRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 直接内转
 * @note 只能使用无审批的内转业务模式，不允许使用需要审批的业务模式
 * @version 5.37.0 - 3.7
 */
class DirectCooperationTransferRequest extends BaseRequest
{
    /**
     * DirectCooperationTransferRequest constructor.
     * @param string $loginName
     * @param string $businessMode
     */
    public function __construct(string $loginName, string $businessMode)
    {
        parent::__construct($loginName, 'DCOPRTRF');
        $this->appendComponent(new SDKPAYRQXComponent($businessMode));
    }

    /**
     * @note 支付输入明细不能超过 30 条
     * @param DCOPRTRFXComponent $payDetail
     * @return DirectCooperationTransferRequest
     */
    public function addPayDetail(DCOPRTRFXComponent $payDetail)
    {
        $this->appendComponent($payDetail);
        return $this;
    }
}