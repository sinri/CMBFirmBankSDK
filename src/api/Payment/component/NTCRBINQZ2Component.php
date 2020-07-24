<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;

use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTCRBINQZ2Component
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string NATACC C(35) 国际外汇主账户
 * @property string NGTACC C(35) 国内外汇主账户
 * @property string NATASB C(35) 国际外汇子账户
 * @property string NATNAM Z(62) 国际外汇子账户名称
 * @property string NGTASB C(35) 国内外汇子账户
 * @property string NGTNAM Z(62) 国内外汇子账户名称
 * @property string CCYNBR C(2) 币种 @see <API DOC Appendix 3>
 * @property string RSV50Z C(50) 特殊码
 */
class NTCRBINQZ2Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTCRBINQZ2';
    }
}