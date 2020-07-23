<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQABINFZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

class GetHistoryBalanceInfoResponse extends BaseResponse
{
    /**
     * @var NTQABINFZComponent[]
     */
    protected $balanceList=[];

    /**
     * @return NTQABINFZComponent[]
     */
    public function getBalanceList(): array
    {
        return $this->balanceList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTQABINFZ'){
            $this->balanceList[]=new NTQABINFZComponent($component);
        }
        // else: just ignore
    }
}