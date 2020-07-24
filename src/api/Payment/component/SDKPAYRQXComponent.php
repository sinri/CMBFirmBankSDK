<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKPAYRQXComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string BUSCOD C(6) [optional] 业务类别 @see `BusinessCodeDefinition::CODE_OF_*PAY` 直接支付时必填
 * @property string BUSMOD C(5) 业务模式编号 直接支付时默认为00001 业务模式编号和业务模式名称同时有值时 BUSMOD 有效
 * @property string MODALS  [optional] 业务模式名称
 */
class SDKPAYRQXComponent extends RequestComponent
{
    /**
     * SDKPAYRQXComponent constructor.
     * @param string $businessMode
     */
    public function __construct(string $businessMode)
    {
        $this->BUSMOD = $businessMode;
    }

    public function getTagName(): string
    {
        return "SDKPAYRQX";
    }
}