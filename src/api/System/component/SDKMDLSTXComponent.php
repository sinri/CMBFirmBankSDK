<?php


namespace leqee\CMBFirmBankSDK\api\System\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKMDLSTXComponent
 * @package leqee\CMBFirmBankSDK\api\System\component
 * @property string BUSCOD 业务类别 C(6) `BusinessCodeDefinition::CODE_OF_*`
 */
class SDKMDLSTXComponent extends RequestComponent
{
    /**
     * SDKMDLSTXComponent constructor.
     * @param string $businessCode 业务类别 C(6) `BusinessCodeDefinition::CODE_OF_*`
     */
    public function __construct(string $businessCode)
    {
        $this->BUSCOD = $businessCode;
    }

    public function getTagName(): string
    {
        return 'SDKMDLSTX';
    }
}