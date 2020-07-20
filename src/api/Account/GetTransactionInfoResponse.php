<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQTSINFZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

class GetTransactionInfoResponse extends BaseResponse
{
    /**
     * @var NTQTSINFZComponent[]
     */
    protected $transactionList=[];

    /**
     * @return NTQTSINFZComponent[]
     */
    public function getTransactionList(): array
    {
        return $this->transactionList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        $this->transactionList[]=new NTQTSINFZComponent($component);
    }
}