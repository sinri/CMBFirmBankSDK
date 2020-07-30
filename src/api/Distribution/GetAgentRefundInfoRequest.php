<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGDRFDY1Component;

/**
 * Class GetAgentRefundInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 代发退票明细查询
 * @version 5.37.0 - 4.12
 */
class GetAgentRefundInfoRequest extends BaseRequest
{
    /**
     * GetAgentInfoRequest constructor.
     * @param string $loginName
     * @param NTAGDRFDY1Component $queryComponent
     */
    public function __construct(string $loginName, NTAGDRFDY1Component $queryComponent)
    {
        parent::__construct($loginName, 'NTAGDRFD');
        $this->appendComponent($queryComponent);
    }
}