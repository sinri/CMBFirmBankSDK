<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class DCOPDPAYXComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string YURREF C(30) 业务参考号 唯一性标识该笔业务的编号 "企业银行编号 + 业务类型 + 业务参考号" 直联必须用企业提供业务参考号
 * @property string EPTDAT D [optional] 期望日 默认为当前日期
 * @property string EPTTIM T [optional] 期望时间 默认为'000000'
 * @property string DBTACC N(35) 付方账号 该账号币种类型必须与币种字段相符
 * @property string DBTBBK C(2) 付方开户地区代码 @see <API DOC Appendix 1>
 * @property string TRSAMT M 交易金额
 * @property string CCYNBR C(2) 币种代码 @see<API DOC Appendix 3> 币种暂只支持'10(人名币)'
 * @property string STLCHN C(1) 结算方式代码 N:普通;F:快速 只对跨行交易有效
 * @property string NUSAGE Z(62) 用途 对应对账单中的摘要 NARTXT
 * @property string BUSNAR Z(200) [optional] 业务摘要 用于企业付款时填写说明或者备注
 * @property string BNKFLG   系统内外标志 Y:招行;N:非招行
 * @property string CRTACC N(35) 收方帐号 该帐号的币种类型必须与币种字段相符
 * @property string CRTNAM Z(62) 收方帐户名
 * @property string LRVEAN Z(200) [optional] 收方长户名 收方帐户名与收方长户名不能同时为空
 * @property string BRDNBR C(30) [optional] 收方行号 人行自动支付收方联行号
 * @property string CRTBNK Z(62) [optional] 收方开户行 跨行支付 (BNKFLG=N) 必填
 * @property string CTYCOD C(4) [optional] 城市代码 @see<API DOC Appendix 18>  CRTFLG 不为'Y'时行内支付必填
 * @property string CRTADR Z(62) [optional] 收方行地址 跨行支付 (BNKFLG=N)必填; CRTFLG 不为'Y'时行内支付必填
 * @property string CRTFLG C(1) [optional] 收方信息不检查标志 默认为'Y' 行内支付不检查城市代码和收方行地址
 * @property string NTFCH1 C(36) [optional] 收方电子邮件 用于交易成功后邮件通知
 * @property string NTFCH2 C(16) [optional] 收方移动电话 用于交易成功后短信通知
 * @property string CRTSQN C(20) [optional] 收方编号 非受限收方模式下可重复
 * @property string TRSTYP C(6) [optional] 业务种类 默认100001 100001=普通汇兑,101001=慈善捐款,101002=其他
 * @property string RCVCHK C(1) [optional] 行内收方账号户名校验 1:校验; 空或者其他值:不校验
 * @property string RSV28Z C(27) [optional] 保留字段 虚拟户支付时, 前 10 位填虚拟户编号 集团支付不支持虚拟户支付
 */
class DCOPDPAYXComponent extends RequestComponent
{
    public function __construct(string $referenceNo, $billToAccount, $billToBranchBank, $transactionAmount,
                                $currencyCode, $settlement, $usage, $bankFlag, $recipientAccount, $recipientName)
    {
        $this->YURREF=$referenceNo;
        $this->DBTACC=$billToAccount;
        $this->DBTBBK=$billToBranchBank;
        $this->TRSAMT=$transactionAmount;
        $this->CCYNBR=$currencyCode;
        $this->STLCHN=$settlement;
        $this->NUSAGE=$usage;
        $this->BNKFLG=$bankFlag;
        $this->CRTACC=$recipientAccount;
        $this->CRTNAM=$recipientName;
    }

    public function getTagName(): string
    {
        return "DCOPDPAYX";
    }
}























