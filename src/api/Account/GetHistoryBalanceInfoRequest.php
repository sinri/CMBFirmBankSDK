<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQABINFYComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetHistoryBalanceInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询账户历史余额
 * @version 5.37.0 - 2.1
 */
class GetHistoryBalanceInfoRequest extends BaseRequest
{
    /**
     * GetHistoryBalanceInfoRequest constructor.
     * @param string $loginName
     * @param NTQABINFYComponent $queryComponent
     */
    public function __construct(string $loginName, NTQABINFYComponent $queryComponent)
    {
        parent::__construct($loginName, 'SDKNTQABINF');
        $this->appendComponent($queryComponent);
    }
}