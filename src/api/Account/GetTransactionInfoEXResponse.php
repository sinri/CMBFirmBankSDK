<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTQTSINFZComponent;
use leqee\CMBFirmBankSDK\api\Account\component\NTRBPTRSZ1Component;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetTransactionInfoEXRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 账户交易信息断点查询
 * @version 5.37.0 - 2.4
 */
class GetTransactionInfoEXResponse extends BaseResponse
{
    /**
     * @var NTRBPTRSZ1Component
     */
    protected NTRBPTRSZ1Component $transactionDigest;

    /**
     * @return NTRBPTRSZ1Component
     */
    public function getTransactionDigest()
    {
        return $this->transactionDigest;
    }

    /**
     * @note 最多返回30条数据，超过 30 条请使用续传
     * @var NTQTSINFZComponent[]
     */
    protected array $transactionList = [];

    /**
     * @return NTQTSINFZComponent[]
     */
    public function getTransactionList(): array
    {
        return $this->transactionList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTRBPTRSZ1') {
            $this->transactionDigest = new NTRBPTRSZ1Component($component);
        }elseif ($component->getElementTag() === 'NTQTSINFZ') {
            $this->transactionList[] = new NTQTSINFZComponent($component);
        }
    }
}