<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGCAGCZ1Component
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string REQSTA C(3) 请求状态 @see<API DOC Appendix 5>
 * @property string RSV50Z C(50) 保留字段
 */
class NTAGCAGCZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTAGCAGCZ1';
    }
}