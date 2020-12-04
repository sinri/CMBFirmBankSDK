<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class AGFEERRCZ1Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string TRXNBR C(15) 交易流水号
 * @property string CNVNBR C(6) 合作协议号
 * @property string PRDCOD C(8) 产品编码
 * @property string BTHNBR C(10) 交易批次号
 * @property string FEEMOD C(1) 付费方式
 * @property string FEEEAC C(35) 付费户口号
 * @property string EACNAM Z(62) 付费户口名称
 * @property string EACBRN C(6) 付费户口开户行
 * @property string CCYNBR C(2) 收费货币
 * @property string TRXAMT M 收费金额
 * @property string TRXRMK Z(62) 摘要
 * @property string TRXDAT D 交易日期
 * @property string TRXBRN C(6) 交易网点
 * @property string ISTNBR C(13) 打印实例号
 * @property string SPL100 C(100) 特殊码 100
 */
class AGFEERRCZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'AGFEERRCZ1';
    }
}