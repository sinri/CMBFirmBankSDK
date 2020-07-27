<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\SDKATDQYXComponent;

/**
 * Class GetAgentDetailRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询交易明细信息
 * @version 5.37.0 - 4.4
 */
class GetAgentDetailRequest extends BaseRequest
{
    /**
     * GetAgentDetailRequest constructor.
     * @param string $loginName
     * @param string $requestNo
     */
    public function __construct(string $loginName, string $requestNo)
    {
        parent::__construct($loginName, 'GetAgentDetail');
        $this->appendComponent(new SDKATDQYXComponent($requestNo));
    }
}