<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKATSRQXComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BUSCOD C(6) 业务代码 N03010:代发工资;N03020:代发;N03030:代扣 默认为N03010
 * @property string BUSMOD C(5) 业务模式编号 编号和名称填写其一, 填写编号则名称无效
 * @property string MODALS Z(62) 业务模式名称
 * @property string C_TRSTYP Z 交易代码名称 @see<API DOC Appendix 45> 代发代扣时必填 默认为BYSA:代发工资
 * @property string TRSTYP C(4) 交易代码
 * @property string EPTDAT D [optional] 期望日期 直接代发不支持期望日
 * @property string DBTACC C(35) 转出账号/转入账号 代发为转出账号;代扣为转入账号
 * @property string BBKNBR C(2) 分行代码 @see<API DOC Appendix 1> 分行代码和名称不能同时为空
 * @property string BANKAREA  分行名称
 * @property string SUM M 总金额
 * @property string TOTAL N(4) 总笔数
 * @property string CCYNBR N(2) [optional] 币种代码 @see<API DOC Appendix 3> 默认10:人名币
 * @property string CURRENCY Z(1,10) [optional] 币种名称
 * @property string YURREF C(1,30) 业务参考号
 * @property string MEMO Z(1,42) 用途
 * @property string DMANBR C(1,20) [optional] 虚拟户编号 记账宝使用
 * @property string GRTFLG C(1) [optional] 直连经办网银审批标志 为'Y'时必须使用有审批岗的模式;不为'Y'时, 必须使用无审批岗的模式
 */
class SDKATSRQXComponent extends RequestComponent
{
    public function __construct($businessCode, $businessMode, $transactionType, $account, $branchBank,
                                $sum, $total, $referenceNo, $memo)
    {
        $this->BUSCOD = $businessCode;
        $this->BUSMOD = $businessMode;
        $this->TRSTYP = $transactionType;
        $this->DBTACC = $account;
        $this->BBKNBR = $branchBank;
        $this->SUM = $sum;
        $this->TOTAL = $total;
        $this->YURREF = $referenceNo;
        $this->MEMO = $memo;
    }

    public function getTagName(): string
    {
        return 'SDKATSRQX';
    }
}