<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQACINFZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAccountInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询账户详细信息
 * @version 5.37.0 - 2.2
 */
class GetAccountInfoResponse extends BaseResponse
{
    /**
     * @var NTQACINFZComponent[]
     */
    protected $accountInfoList;

    /**
     * @return NTQACINFZComponent[]
     */
    public function getAccountInfoList(): array
    {
        return $this->accountInfoList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTQACINFZ'){
            $this->accountInfoList[]=new NTQACINFZComponent($component);
        }
        // else: just ignore
    }
}