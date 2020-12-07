<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQADINFZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetBalanceInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 批量查询余额
 * @version 5.37.0 - 2.9
 */
class GetBalanceInfoResponse extends BaseResponse
{
    /**
     * @var NTQADINFZComponent[]
     */
    protected $balanceInfoList;

    /**
     * @return NTQADINFZComponent[]
     */
    public function getBalanceInfoList(): array
    {
        return $this->balanceInfoList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTQADINFZ') {
            $this->balanceInfoList[] = new NTQADINFZComponent($component);
        }
        // else: just ignore
    }
}