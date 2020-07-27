<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class DCOPRTRFXComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string YURREF C(30) 业务参考号 唯一性标识该笔业务的编号 "企业银行编号 + 业务类型 + 业务参考号" 直联必须用企业提供业务参考号
 * @property string EPTDAT D [optional] 期望日 默认为当前日期 直联不支持期望日支付
 * @property string EPTTIM T [optional] 期望时间 默认为'000000' 直联不支持期望日支付
 * @property string DBTACC N(35) 付方账号 该账号币种类型必须与币种字段相符
 * @property string DBTBBK C(2) 付方开户地区代码 @see <API DOC Appendix 1>
 * @property string TRSAMT M 交易金额
 * @property string CCYNBR C(2) 币种代码 @see<API DOC Appendix 3>
 * @property string NUSAGE Z(62) 用途 对应对账单中的摘要 NARTXT
 * @property string BUSNAR Z(200) [optional] 业务摘要 用于企业付款时填写说明或者备注
 * @property string CRTACC C(35) 收方帐号 该帐号的币种类型必须与币种字段相符
 * @property string CRTFLG C(1) [optional] 收方信息不检查(收方开户地区信息)标志 默认为'Y' 外币内转不支持
 * @property string CRTBBK C(2) [optional] 收方开户地区代码 @see<API DOC Appendix 1> CRTFLG 不为'Y'时必填 外币内转不能为空
 */
class DCOPRTRFXComponent extends RequestComponent
{
    public function __construct(
        string $referenceNo,
        $billToAccount,
        $billToBranchBank,
        $transactionAmount,
        $currencyCode,
        $usage,
        $recipientAccount
    )
    {
        $this->YURREF = $referenceNo;
        $this->DBTACC = $billToAccount;
        $this->DBTBBK = $billToBranchBank;
        $this->TRSAMT = $transactionAmount;
        $this->CCYNBR = $currencyCode;
        $this->NUSAGE = $usage;
        $this->CRTACC = $recipientAccount;
    }

    public function getTagName(): string
    {
        return "DCOPRTRFX";
    }
}