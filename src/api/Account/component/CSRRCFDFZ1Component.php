<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class CSRRCFDFZ1Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string ISTNBR C(13) 打印实例号
 * @property string CHKCOD C(16) 验证码
 * @property string ITMCOD C(8)  回单代码
 * @property string TRSSEQ C(16) 流水号
 * @property string SPLC40 C(40) 特殊码
 */
class CSRRCFDFZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'CSRRCFDFZ1';
    }
}
