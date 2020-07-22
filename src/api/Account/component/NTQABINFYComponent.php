<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTQABINFYComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR N(2) branch code @see <API DOC Appendix 1>
 * @property string ACCNBR C(1,35) Account Number
 * @property string BGNDAT D begin date; Note: must be earlier than today
 * @property string ENDDAT D end date; Note: must be earlier than today and date interval cannot beyond 31 days
 */
class NTQABINFYComponent extends RequestComponent
{
    /**
     * NTQABINFYComponent constructor.
     * @param string $bankBranch
     * @param string $account
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $bankBranch,string $account,string $beginDate,string $endDate)
    {
        $this->BBKNBR=$bankBranch;
        $this->ACCNBR=$account;
        $this->BGNDAT=$beginDate;
        $this->ENDDAT=$endDate;
    }


    public function getTagName(): string
    {
        return 'NTQABINFY';
    }
}