<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQADINFXComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetBalanceInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 批量查询余额
 * @version 5.37.0 - 2.9
 */
class GetBalanceInfoRequest extends BaseRequest
{
    public function __construct(string $loginName)
    {
        parent::__construct($loginName, 'NTQADINF');
    }

    /**
     * @note 多账户个数 1..30
     * @param string $bankBranch
     * @param string $account
     * @return GetBalanceInfoRequest
    */
    public function addQueryAccount(string $bankBranch, string $account)
    {
        $this->appendComponent(new NTQADINFXComponent($bankBranch, $account));
        return $this;
    }
}