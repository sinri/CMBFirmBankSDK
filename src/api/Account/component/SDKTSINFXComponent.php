<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKTSINFXComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR N(2) branch code @see <API DOC Appendix 1>
 * @property string C_BBKNBR Z(1,62) [optional] branch name @see <API DOC Appendix 1> no need when code exists
 * @property string ACCNBR C(1,35) Account Number
 * @property string BGNDAT D begin date
 * @property string ENDDAT D end date; Note: from beginning to ending cannot beyond 100 days
 * @property string LOWAMT M [optional] lowest amount, 0.00 as default
 * @property string HGHAMT M [optional] highest amount, 9999999999999.99 as default
 * @property string AMTCDR C(1) [optional] Code for Credit and Debit 借贷码 C:收入 D:支出
 */
class SDKTSINFXComponent extends RequestComponent
{
    /**
     * SDKTSINFXComponent constructor.
     * @param string $bankBranch
     * @param string $account
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $bankBranch, string $account, string $beginDate, string $endDate)
    {
        $this->BBKNBR = $bankBranch;
        $this->ACCNBR = $account;
        $this->BGNDAT = $beginDate;
        $this->ENDDAT = $endDate;
    }

    public function setLowestAmount($value)
    {
        $this->LOWAMT = $value;
        return $this;
    }

    public function setHighestAmount($value)
    {
        $this->HGHAMT = $value;
        return $this;
    }

    public function getTagName(): string
    {
        return 'SDKTSINFX';
    }
}