<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTQRYSTYX1Component
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string BUSCOD C(6) 业务类型 N02020:内部转帐;N02030:支付;N02031:直接支付;N02040:集团支付;N02041:直接集团支付
 * @property string YURREF C(30) 业务参考号 不提供模糊查询
 * @property string BGNDAT D 起始日期 按经办日期查询, 起始日期不可小于当前日期前 90 天
 * @property string ENDDAT D 结束日期 起始结束日期间隔不能超过一周
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTQRYSTYX1Component extends RequestComponent
{
    /**
     * NTQRYSTYX1Component constructor.
     * @param $businessCode
     * @param $referenceNo
     * @param $beginDate
     * @param $endDate
    */
    public function __construct($businessCode, $referenceNo, $beginDate, $endDate)
    {
        $this->BUSCOD = $businessCode;
        $this->YURREF = $referenceNo;
        $this->BGNDAT = $beginDate;
        $this->ENDDAT = $endDate;
    }

    public function getTagName(): string
    {
        return 'NTQRYSTYX1';
    }
}