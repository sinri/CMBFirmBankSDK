<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\SDKTSINFXComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetTransactionInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询账户交易信息
 * @version 5.37.0 - 2.3
 */
class GetTransactionInfoRequest extends BaseRequest
{
    /**
     * GetTransactionInfoRequest constructor.
     * @param string $loginName
     * @param SDKTSINFXComponent $queryComponent
     */
    public function __construct(string $loginName, SDKTSINFXComponent $queryComponent)
    {
        parent::__construct($loginName, 'GetTransInfo');
        $this->appendComponent($queryComponent);
    }
}