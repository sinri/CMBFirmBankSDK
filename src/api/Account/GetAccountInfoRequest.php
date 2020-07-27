<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\SDKACINFXComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetAccountInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询账户详细信息
 * @version 5.37.0 - 2.2
 */
class GetAccountInfoRequest extends BaseRequest
{
    public function __construct(string $loginName)
    {
        parent::__construct($loginName, 'GetAccInfo');
    }

    public function addQueryAccount(string $bankBranch, string $account)
    {
        $this->appendComponent(new SDKACINFXComponent($bankBranch, $account));
        return $this;
    }
}