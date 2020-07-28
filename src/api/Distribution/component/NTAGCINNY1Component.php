<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKATSRQXComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BUSCOD C(6) 业务类型 N03010:代发工资;N03020:代发;N03030:代扣
 * @property string BUSMOD C(5) 业务模式
 * @property string BGNDAT D 起始日期 起始结束日期间隔不可超过一周
 * @property string ENDDAT D 结束日期
 * @property string DATFLG C(1) [optional] 日期类型 A:经办日期;B:期望日期 默认为A
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTAGCINNY1Component extends RequestComponent
{
    /**
     * NTAGCINNY1Component constructor.
     * @param string $businessCode
     * @param string $businessMode
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $businessCode, string $businessMode, string $beginDate, string $endDate)
    {
        $this->BUSCOD=$businessCode;
        $this->BUSMOD=$businessMode;
        $this->BGNDAT=$beginDate;
        $this->ENDDAT=$endDate;
    }


    public function getTagName(): string
    {
        return 'NTAGCINNY1';
    }
}