<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTACCBBKYComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string ACCNBR C(35) Account Number
 */
class NTACCBBKYComponent extends RequestComponent
{
    /**
     * NTACCBBKYComponent constructor.
     * @param string $account
     */
    public function __construct(string $account)
    {
        $this->ACCNBR=$account;
    }


    public function getTagName(): string
    {
        return 'NTACCBBKY';
    }
}