<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGCINYX1Component
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BUSCOD C(6) N03010:代发工资;N03020:代发;N03030:代扣
 * @property string YURREF C(30) 业务参考号
 * @property string BGNDAT D 起始日期 按经办日期查询, 起始结束日期间隔不能超过一周 起始日期不可小于当前日期前 90 天
 * @property string ENDDAT D 结束日期
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTAGCINYX1Component extends RequestComponent
{
    /**
     * NTAGCINYX1Component constructor.
     * @param string $businessCode
     * @param string $referenceNo
     * @param string $beginDate
     * @param string $endDate
     */
    public function __construct(string $businessCode, string $referenceNo, string $beginDate, string $endDate)
    {
        $this->BUSCOD = $businessCode;
        $this->YURREF = $referenceNo;
        $this->BGNDAT = $beginDate;
        $this->ENDDAT = $endDate;
    }


    public function getTagName(): string
    {
        return 'NTAGCINYX1';
    }
}