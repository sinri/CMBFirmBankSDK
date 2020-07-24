<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTCRBINQZComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string NTBNBR C(8) 企业银行编号
 * @property string NATACC C(35) 国际外汇主账户
 * @property string NATNAM Z(62) 国际外汇主账户名称
 * @property string NGTACC C(35) 国内外汇主账户
 * @property string NGTNAM Z(62) 国内外汇主账名称
 * @property string CCYNBR C(2) 币种 @see <API DOC Appendix 3>
 * @property string NATLMT M 净融入总额度
 * @property string NGTLMT M 净融出总额度
 * @property string NATUSE M 净融入已用额度
 * @property string NGTUSE M 净融出已用额度
 * @property string NATBAL M 净融入可用额度
 * @property string NGTBAL M 净融出可用额度
 * @property string RSV50Z C(50) 特殊码
 */
class NTCRBINQZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTCRBINQZ';
    }
}



