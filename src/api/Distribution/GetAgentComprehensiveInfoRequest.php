<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;

use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCQRIYComponent;

/**
 * Class GetAgentComprehensiveInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 代发代扣直连综合查询
 * @version 5.37.0 - 4.11
 */
class GetAgentComprehensiveInfoRequest extends BaseRequest
{
    /**
     * GetAgentComprehensiveInfoRequest constructor.
     * @param string $loginName
     * @param NTAGCQRIYComponent $queryComponent
     */
    public function __construct(string $loginName, NTAGCQRIYComponent $queryComponent)
    {
        parent::__construct($loginName, 'NTAGCQRI');
        $this->appendComponent($queryComponent);
    }
}