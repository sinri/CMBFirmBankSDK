<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTACCBBKYComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetBranchBankInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询分行号信息
 * @version 5.37.0 - 2.6
 */
class GetBranchBankInfoRequest extends BaseRequest
{
    public function __construct(string $loginName, string $account = null)
    {
        parent::__construct($loginName, 'GetBbkInfo');
        if ($account) $this->appendComponent(new NTACCBBKYComponent($account));
    }
}