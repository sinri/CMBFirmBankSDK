<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQACLSTZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAccountListResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询可查询/可经办的账户列表
 * @version 5.37.0 - 2.1
 */
class GetAccountListResponse extends BaseResponse
{
    /**
     * @var NTQACLSTZComponent[]
     */
    protected array $accountList = [];

    /**
     * @return NTQACLSTZComponent[]
     */
    public function getAccountList(): array
    {
        return $this->accountList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTQACLSTZ') {
            $this->accountList[] = new NTQACLSTZComponent($component);
        }
        // else: just ignore
    }
}