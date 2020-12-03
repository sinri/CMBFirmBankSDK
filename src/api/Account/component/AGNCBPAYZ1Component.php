<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class AGNCBPAYZ1Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string PRDCOD C(8) 产品编码
 * @property string CNVNBR C(6) 合作协议号
 * @property string BTHNBR C(10) 交易批次号
 * @property string TSKNBR C(13) 任务实例号
 * @property string RCVEAC C(35) 收款户口号
 * @property string RCVNAM Z(62) 收款客户名称
 * @property string RCVBRN C(6) 收款户口开户行
 * @property string PAYEAC C(35) 付款户口号
 * @property string PAYNAM Z(62) 付款客户名称
 * @property string PAYBRN C(6) 付款户口开户行
 * @property string CCYNBR C(2) 交易货币
 * @property string TRXAMT M 交易金额
 * @property string TRXRMK Z(62) 摘要
 * @property string TRXDAT D 交易日期
 * @property string TRXBRN C(6) 交易网点
 * @property string TRXSET C(15) 交易套号
 * @property string TRXNBR C(15) 交易流水号
 * @property string TRSREF C(30) 交易参考号
 * @property string ISTNBR C(13) 打印实例号
 * @property string SPL100 Z(100) 特殊码 100
 */
class AGNCBPAYZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'AGNCBPAYZ1';
    }
}








