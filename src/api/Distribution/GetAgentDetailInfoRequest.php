<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGDINFY1ComponentForRequest;

/**
 * Class GetAgentDetailInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询大批量代发代扣明细信息
 * @version 5.37.0 - 4.9
 */
class GetAgentDetailInfoRequest extends BaseRequest
{
    /**
     * GetAgentDetailInfoRequest constructor.
     * @param string $loginName
     * @param string $requestNo
     */
    public function __construct(string $loginName, string $requestNo)
    {
        parent::__construct($loginName, 'NTAGDINF');
        $this->appendComponent(new NTAGDINFY1ComponentForRequest($requestNo));
    }
}