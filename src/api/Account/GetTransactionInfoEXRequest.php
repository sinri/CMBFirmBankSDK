<?php


namespace leqee\CMBFirmBankSDK\api\Account;

use leqee\CMBFirmBankSDK\api\Account\component\SDKRBPTRSXComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetTransactionInfoEXRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 账户交易信息断点查询
 * @version 5.37.0 - 2.4
 */
class GetTransactionInfoEXRequest extends BaseRequest
{
    /**
     * GetTransactionInfoEXRequest constructor.
     * @param string $loginName
     * @param SDKRBPTRSXComponent $queryComponent
     */
    public function __construct(string $loginName, SDKRBPTRSXComponent $queryComponent)
    {
        parent::__construct($loginName, 'GetTransInfoEX');
        $this->appendComponent($queryComponent);
    }
}