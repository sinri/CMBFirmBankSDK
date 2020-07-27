<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGTLS2ZComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string ACCNBR C(35) 账户
 * @property string CNVNBR C(6) 协议号
 * @property string TRSTYP C(4) 交易代码
 * @property string C_TRSTYP  交易代码名称
 * @property string CCYNBR C(2) 币种
 * @property string EFTDAT D 生效日期
 * @property string EXPDAT D 失效日期
 * @property string SGNDAT D 签约日期
 * @property string CLTCNV C(1) 三方协议标志
 * @property string STSCOD C(1) 协议状态 A:有效;C:关闭
 */
class NTAGTLS2ZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return  'NTAGTLS2Z';
    }
}