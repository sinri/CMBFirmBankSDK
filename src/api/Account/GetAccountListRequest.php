<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\SDKACLSTXComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetAccountListRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询可查询/可经办的账户列表
 * @version 5.37.0 - 2.1
 */
class GetAccountListRequest extends BaseRequest
{

    public function __construct(string $loginName,string $businessCode,string $businessMode)
    {
        parent::__construct($loginName,'ListAccount');
        $this->appendComponent(new SDKACLSTXComponent($businessCode,$businessMode));
    }
}