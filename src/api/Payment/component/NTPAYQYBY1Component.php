<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTPAYQYBY1Component
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string BBKNBR C(2) 分行号
 * @property string ACCNBR C(35) 对公账号
 * @property string BGNDAT D 交易开始日期
 * @property string ENDDAT D 交易结束日期
 * @property string REQNBR C(10) [optional] 流程实例号
 * @property string CTNKRY C(80) [optional] 续传键值
 */
class NTPAYQYBY1Component extends RequestComponent
{
    /**
     * NTPAYQYBY1Component constructor.
     * @param string $branchBank
     * @param string $account
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $branchBank,string $account,string $beginDate,string $endDate)
    {
        $this->BBKNBR=$branchBank;
        $this->ACCNBR=$account;
        $this->BGNDAT=$beginDate;
        $this->ENDDAT=$endDate;
    }


    public function getTagName(): string
    {
        return 'NTPAYQYBY1';
    }
}