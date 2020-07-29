<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGDRFDY1Component
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BBKNBR C(2) 分行号
 * @property string ACCNBR C(35) 对公账号
 * @property string TRSTYP C(4) 代发种类 @see<API DOC Appendix 45>
 * @property string BGNDAT D 交易开始日期
 * @property string ENDDAT D 交易结束日期
 * @property string REQNBR C(10) [optional] 流程实例号
 * @property string CTNKRY C(80) [optional] 续传键值
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTAGDRFDY1Component extends RequestComponent
{
    /**
     * Class NTAGDRFDY1Component constructor.
     * @param $branchBank
     * @param $account
     * @param $transactionType
     * @param $beginDate
     * @param $endDate
    */
    public function __construct($branchBank, $account, $transactionType, $beginDate, $endDate)
    {
        $this->BBKNBR = $branchBank;
        $this->ACCNBR = $account;
        $this->TRSTYP = $transactionType;
        $this->BGNDAT = $beginDate;
        $this->ENDDAT = $endDate;
    }

    public function getTagName(): string
    {
        return 'NTAGDRFDY1';
    }
}