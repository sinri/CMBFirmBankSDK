<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTPAYQYBZ1Component
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string REQNBR C(10) 流程实例号
 * @property string YURREF C(30) 业务参考号
 * @property string BUSNBR C(16) 汇款编号
 * @property string OUTTYP C(2) 汇款方式
 * @property string BUSTYP C(2) 转账汇款种类
 * @property string BUSLVL C(1) 汇款优先级
 * @property string BUSSTS C(1) 汇款业务状态
 * @property string CLRSTS C(1) 清算状态
 * @property string ISUCNL C(3) 汇款发起通道
 * @property string ISUDAT D 发起日期
 * @property string TRSBBK C(3) 处理分行
 * @property string TRSBRN C(6) 处理机构
 * @property string CCYNBR C(2) 交易货币
 * @property string TRSAMT S(15,2) 金额
 * @property string CCYTYP C(1) 钞汇标志
 * @property string SNDEAC C(35) 付方户口号
 * @property string SNDEAN Z(62) 付方户名
 * @property string SNDCLT C(10) 付方客户号
 * @property string SNDBRN C(6) 付方开户机构
 * @property string SNDEAB Z(62) 付方开户行
 * @property string SNDEAA Z(62)  付方开户地
 * @property string RCVEAC C(35) 收方户口号
 * @property string RCVEAN Z(62) 收方户名
 * @property string RCVBBK C(3) 收方分行号
 * @property string RCVBRD C(14) 收方支付行号
 * @property string RCVEAB Z(62) 收方开户行
 * @property string RCVEAA Z(62) 收方开户地
 * @property string RCVFLG C(1) 收方同城查询标志
 * @property string RCVREF C(16) 收方查询键值
 * @property string NARTXT Z(100) 摘要
 * @property string TRNBRN C(6) 转汇机构
 * @property string FEEAMT S(15,2) 费用总额
 * @property string FEECCY C(2) 币种
 * @property string FEETYP C(1) 收费方式
 * @property string PSBDAT D 凭证日期
 * @property string PSBTYP C(4) 提出凭证种类
 * @property string PSBNBR C(20) 凭证号码
 * @property string TRSTYP C(6) 行内业务种类
 * @property string CTYFLG C(1) 同城异地标志
 * @property string SYSFLG C(1) 系统内外标志
 * @property string RCVTYP C(1) 收方公私标志
 * @property string PRCTRS C(16) 当前交易流水
 * @property string REGTRS C(16) 登记交易流水
 * @property string TRSPCH C(5) 提出通道
 * @property string KPSNBR C(20) 当前支付系统键值
 * @property string REFNBR C(30) 业务参考号
 * @property string WATRCN C(1) 资金停留原因
 * @property string WATTRS C(16) 资金停留流水
 * @property string RCDVER B(2) 记录版本号
 * @property string RCDSTS C(1) 记录状态
 * @property string UPDDAT D 更新日期
 * @property string SPLC80 C(80) 特殊码
 */
class NTPAYQYBZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTPAYQYBZ1';
    }
}












