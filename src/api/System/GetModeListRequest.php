<?php


namespace leqee\CMBFirmBankSDK\api\System;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\System\component\SDKMDLSTXComponent;

/**
 * Class GetModeListRequest
 * @package leqee\CMBFirmBankSDK\api\System
 * 查询可经办的业务模式信息
 * @version 5.37.0 - 1.4
 */
class GetModeListRequest extends BaseRequest
{
    public function __construct(string $loginName, string $businessCode)
    {
        parent::__construct($loginName, 'ListMode');
        $this->appendComponent(new SDKMDLSTXComponent($businessCode));
    }
}