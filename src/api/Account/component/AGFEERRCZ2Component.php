<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class AGFEERRCZ2Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string FEEITM C(5) 收费项目
 * @property string FEENAM Z(62) 费用名称
 * @property string FEENUM N(5) 收费笔数
 * @property string FEECCY C(2) 收费币种
 * @property string FEEAMT M 收费金额
 * @property string ISTNBR C(13) 打印实例号
 * @property string SPL100 C(100) 特殊码 100
 */
class AGFEERRCZ2Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'AGFEERRCZ2';
    }
}