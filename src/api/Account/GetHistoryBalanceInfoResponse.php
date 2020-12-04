<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQABINFZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetHistoryBalanceInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询账户历史余额
 * @version 5.37.0 - 2.5
 */
class GetHistoryBalanceInfoResponse extends BaseResponse
{
    /**
     * @var NTQABINFZComponent[]
     */
    protected array $balanceList = [];

    /**
     * @return NTQABINFZComponent[]
     */
    public function getBalanceList(): array
    {
        return $this->balanceList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTQABINFZ') {
            $this->balanceList[] = new NTQABINFZComponent($component);
        }
        // else: just ignore
    }
}