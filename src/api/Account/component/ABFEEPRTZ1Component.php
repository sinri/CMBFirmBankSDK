<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class ABFEEPRTZ1Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string SYSDAT D 发生日期
 * @property string SEQNBR C(16) 流水号
 * @property string TRXSET C(15) 流水号
 * @property string BRNNBR C(6) 部门号
 * @property string ACCNBR C(35) 账号/户口
 * @property string ACTRGN C(3) 资金地区
 * @property string CCYTYP C(1) 钞汇标志
 * @property string ACTCOD C(5) 账户代码
 * @property string CLTNBR C(10) 客户号
 * @property string ACTSEQ C(5) 账户序号
 * @property string CCYNBR C(2) 货币
 * @property string ACCITM C(8) 科目/核算种类
 * @property string AMTCOD C(1) 金额码
 * @property string AMTTRS M 交易金额
 * @property string NARSMT Z(16) 账单摘要
 * @property string BUSNBR C(20) 业务编号
 * @property string EACNAM Z(62) 户名
 * @property string BRNNAM Z(22) 机构名称
 * @property string ISTNBR C(13) 打印实例
 * @property string SPLC80 C(80) 保留字段
 */
class ABFEEPRTZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'ABFEEPRTZ1';
    }
}