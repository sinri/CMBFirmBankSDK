<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class CSTRFPRTX0Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string SNDEAC C(35) 付方户口号
 * @property string SNDEAN Z(100) 付方户名
 * @property string SNDEAB Z(100) 付方开户行
 * @property string SNDEAA Z(100) 付方开户地
 * @property string RCVEAC C(35) 收方户口号
 * @property string RCVEAN Z(100) 收方户名
 * @property string RCVEAB Z(100) 收方开户行
 * @property string RCVEAA Z(100) 收方开户地
 * @property string BILTYP C(4) 票据种类
 * @property string BILNBR C(20) 票据号码
 * @property string TRSAMT M 交易金额
 * @property string CCYNBR C(2) 交易货币
 * @property string AGTBBN C(20) 代理行交换号
 * @property string AGTBKN Z(100) 代理行行名
 * @property string SMTADR Z(100) 汇出地点
 * @property string ISUDAT D 发起日期
 * @property string RTEDAT D 起息日
 * @property string NARTXT Z(100) 摘要
 * @property string REFNBR C(15) 交易流水号
 * @property string ORGREF C(15) 原交易流水号
 * @property string ISTNBR C(13) 打印实例号
 * @property string EXTNAR C(20) 附加摘要
 * @property string SMTDAT D 提出日期
 * @property string SEQNBR C(6) 打印顺序
 * @property string SNDBK1 C(12) 票交付方行号
 * @property string RCVBK1 C(12) 票交收方行号
 * @property string NARTX1 Z(100) 扩展摘要
 * @property string PSBSEQ C(30) 凭证顺序号
 * @property string BNKRM1 Z(62) 附加摘要 1
 * @property string BNKRM2 Z(62) 附加摘要 2
 * @property string BNKRM3 Z(62) 附加摘要 3
 * @property string BNKRM4 Z(62) 附加摘要 4
 * @property string BNKRM5 Z(62) 附加摘要 5
 * @property string BNKRM6 Z(62) 附加摘要 6
 * @property string RVSTXT C(30) 保留位
 */
class CSTRFPRTX0Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'CSTRFPRTX0';
    }
}

















