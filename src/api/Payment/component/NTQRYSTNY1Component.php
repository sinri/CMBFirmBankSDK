<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTQRYSTNY1Component
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string BUSCOD C(6) 业务类型 @see `BusinessCodeDefinition::CODE_OF_*`
 * @property string BUSMOD C(5) 业务模式
 * @property string BGNDAT D 起始日期 起始结束日期间隔不可超过一周
 * @property string ENDDAT D 结束日期
 * @property string DATFLG C(1) [optional] 日期类型 A:经办日期;B:期望日期 默认为A
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTQRYSTNY1Component extends RequestComponent
{
    /**
     * NTQRYSTNY1Component constructor.
     * @param string $businessCode
     * @param string $businessMode
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $businessCode,string $businessMode,string $beginDate,string $endDate)
    {
        $this->BUSCOD=$businessCode;
        $this->BUSMOD=$businessMode;
        $this->BGNDAT=$beginDate;
        $this->ENDDAT=$endDate;
    }


    public function getTagName(): string
    {
        return 'NTQRYSTNY1';
    }
}













