<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKRBPTRSXComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR N(2) branch code @see <API DOC Appendix 1>
 * @property string C_BBKNBR Z(1,62) [optional] branch name @see <API DOC Appendix 1> no need when code exists
 * @property string ACCNBR C(1,35) Account Number
 * @property string TRSDAT D transaction date
 * @property string TRSSEQ C(9) [optional] transaction sequence 断点续传使用, 以上一次查询返回的 NTRBPTRSZ1 接口
 *  中的记账序号, +1 后填入本次查询(首次查询填 0 或者为空) 交易日切换后, 记账序号又须从 0 起查
 */
class SDKRBPTRSXComponent extends RequestComponent
{
    /**
     * SDKTSINFXComponent constructor.
     * @param string $bankBranch
     * @param string $account
     * @param string $transactionDate
     * @param string $transactionNo
     */
    public function __construct(string $bankBranch, string $account, string $transactionDate, string $transactionNo = '')
    {
        $this->BBKNBR = $bankBranch;
        $this->ACCNBR = $account;
        $this->TRSDAT = $transactionDate;
        $this->TRSSEQ = $transactionNo;
    }

    public function getTagName(): string
    {
        return 'SDKRBPTRSX';
    }
}