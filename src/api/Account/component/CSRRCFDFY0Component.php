<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class CSRRCFDFY0Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string EACNBR C(35) Account Number
 * @property string BEGDAT D begin date;
 * @property string ENDDAT D end date; Note: date interval cannot beyond one month
 * @property string RRCFLG C(1) print flag: 1:未打印; 2:已打印
 * @property string BEGAMT M [optional] begin amount
 * @property string ENDAMT M [optional] end amount
 * @property string RRCCOD C(8) [optional] receipt code
 */
class CSRRCFDFY0Component extends RequestComponent
{
    /**
     * CSRRCFDFY0Component constructor.
     * @param string $account
     * @param string $beginDate
     * @param string $endDate
     * @param string $flag
     */
    public function __construct(string $account, string $beginDate, string $endDate, string $flag)
    {
        $this->EACNBR = $account;
        $this->BEGDAT = $beginDate;
        $this->ENDDAT = $endDate;
        $this->RRCFLG = $flag;
    }


    public function getTagName(): string
    {
        return 'CSRRCFDFY0';
    }
}