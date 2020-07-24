<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetRestrictedRecipientListRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 查询收方限制列表
 * @version 5.37.0 - 3.4
 */
class GetRestrictedRecipientListRequest extends BaseRequest
{
    public function __construct(string $loginName)
    {
        parent::__construct($loginName, 'NTQRYRVL');
    }
}