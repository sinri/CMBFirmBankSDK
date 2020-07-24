<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKACLSTXComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BUSCOD 业务类别 C(6) `BusinessCodeDefinition::CODE_OF_*`
 * @property string BUSMOD 业务模式 C(5) 某个业务有哪些可经办的业务模式，可通过查询可经办的业务模式信息(ListMode) 获得。账务查询 ("BUSCOD=N01010")时忽略该项
 */
class SDKACLSTXComponent extends RequestComponent
{
    /**
     * SDKACLSTXComponent constructor.
     * @param string $businessCode 业务类别 C(6) `BusinessCodeDefinition::CODE_OF_*`
     * @param string $businessMode 业务模式 C(5)
     */
    public function __construct(string $businessCode, $businessMode)
    {
        $this->BUSCOD = $businessCode;
        $this->BUSMOD = $businessMode;
    }

    public function getTagName(): string
    {
        return 'SDKACLSTX';
    }
}