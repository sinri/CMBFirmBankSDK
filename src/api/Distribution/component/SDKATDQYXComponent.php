<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKATDQYXComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR 流程实例号 通过"查询代发代扣交易概要信息"获得
 */
class SDKATDQYXComponent extends RequestComponent
{
    /**
     * SDKATDQYXComponent constructor.
     * @param string $requestNo
     */
    public function __construct(string $requestNo)
    {
        $this->REQNBR = $requestNo;
    }


    public function getTagName(): string
    {
        return 'SDKATDQYX';
    }
}