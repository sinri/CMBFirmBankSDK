<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQTSINFZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetTransactionInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询账户交易信息
 * @version 5.37.0 - 2.2
 */
class GetTransactionInfoResponse extends BaseResponse
{
    /**
     * @var NTQTSINFZComponent[]
     */
    protected $transactionList = [];

    /**
     * @return NTQTSINFZComponent[]
     */
    public function getTransactionList(): array
    {
        return $this->transactionList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        $this->transactionList[] = new NTQTSINFZComponent($component);
    }
}