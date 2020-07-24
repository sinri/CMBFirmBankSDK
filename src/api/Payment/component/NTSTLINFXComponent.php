<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTSTLINFXComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string REQNBR C(10) 流程实例号
 */
class NTSTLINFXComponent extends RequestComponent
{
    /**
     * NTSTLINFXComponent constructor.
     * @param string $requestNo
     */
    public function __construct(string $requestNo)
    {
        $this->REQNBR=$requestNo;
    }

    public function getTagName(): string
    {
        return "NTSTLINFX";
    }
}