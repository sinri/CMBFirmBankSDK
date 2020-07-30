<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGCAGCX1Component
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BEGTAG C(1) 批次开始标志 Y:批次开始;N:续传批次
 * @property string ENDTAG C(1) 批次结束标志 Y:批次结束;N:非结束批次
 * @property string REQNBR C(10) [optional] 流程实例号 第一次上传时必须为空;续传时不能为空, 且所有续传次数流程实例号必须为同一个
 * @property string TTLAMT M 总金额 批次总金额
 * @property string TTLCNT F(8,0) 总笔数 批次总笔数
 * @property string TTLNUM F(3,0) 总次数
 * @property string CURAMT M 本次金额
 * @property string CURCNT F(8,0) 本次笔数
 * @property string CNVNBR C(6) [optional] 合作方协议号
 * @property string CCYNBR C(2) 交易货币 @see<API DOC Appendix 3>
 * @property string NTFINF Z(22) [optional] 个性化短信内容
 * @property string BBKNBR C(2) 分行号 @see<API DOC Appendix 1>
 * @property string ACCNBR C(35) 账号
 * @property string CCYMKT C(1) 货币市场 0:不分钞汇;1:现钞;2:现汇
 * @property string TRSTYP C(4) 交易类型
 * @property string NUSAGE Z(42) 用途
 * @property string EPTDAT D [optional] 期望日 默认为当前日期
 * @property string EPTTIM T [optional] 期望时间 默认为"000000"
 * @property string YURREF C(30) 对方参考号
 * @property string DMANBR C(20) [optional] 虚拟户编号
 * @property string GRTFLG C(1) [optional] 网银审批标志 Y/N
 */
class NTAGCAGCX1Component extends RequestComponent
{
    public function __construct($beginTag, $endTag, $totalAmount, $totalCount, $totalNo, $currentAmount, $currentCount,
                                $currencyCode, $branchBank, $account, $currencyMarket, $transactionType, $usage, $referenceNo)
    {
        $this->BEGTAG = $beginTag;
        $this->ENDTAG = $endTag;
        $this->TTLAMT = $totalAmount;
        $this->TTLCNT = $totalCount;
        $this->TTLNUM = $totalNo;
        $this->CURAMT = $currentAmount;
        $this->CURCNT = $currentCount;
        $this->CCYNBR = $currencyCode;
        $this->BBKNBR = $branchBank;
        $this->ACCNBR = $account;
        $this->CCYMKT = $currencyMarket;
        $this->TRSTYP = $transactionType;
        $this->NUSAGE = $usage;
        $this->YURREF = $referenceNo;
    }

    public function getTagName(): string
    {
        return 'NTAGCAGCX1';
    }
}