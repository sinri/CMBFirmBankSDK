<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCINYX1Component;

/**
 * Class GetAgentInfoByReferenceNoRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 代发结果查询-按业务参考号
 * @version 5.37.0 - 4.10
 */
class GetAgentInfoByReferenceNoRequest extends BaseRequest
{
    /**
     * GetAgentInfoByReferenceNoRequest constructor.
     * @param string $loginName
     * @param NTAGCINYX1Component $queryComponent
     */
    public function __construct(string $loginName, NTAGCINYX1Component $queryComponent)
    {
        parent::__construct($loginName, 'NTAGCINY');
        $this->appendComponent($queryComponent);
    }
}