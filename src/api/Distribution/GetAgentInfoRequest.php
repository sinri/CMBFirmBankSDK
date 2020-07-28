<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCINNY1Component;

/**
 * Class GetAgentInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询交易概要信息
 * @version 5.37.0 - 4.3
 */
class GetAgentInfoRequest extends BaseRequest
{
    /**
     * GetPaymentResultListRequest constructor.
     * @param string $loginName
     * @param NTAGCINNY1Component $queryComponent
     */
    public function __construct(string $loginName, NTAGCINNY1Component $queryComponent)
    {
        parent::__construct($loginName, 'NTAGCINN');
        $this->appendComponent($queryComponent);
    }
}