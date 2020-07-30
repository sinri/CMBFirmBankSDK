<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGTLS2XComponent;

/**
 * Class GetAgentTypeRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询交易代码
 * @version 5.37.0 - 4.1
 */
class GetAgentTypeRequest extends BaseRequest
{
    /**
     * GetAgentTypeRequest constructor.
     * @param string $loginName
     * @param NTAGTLS2XComponent $queryComponent
     */
    public function __construct(string $loginName, NTAGTLS2XComponent $queryComponent)
    {
        parent::__construct($loginName, 'NTAGTLS2');
        $this->appendComponent($queryComponent);
    }
}