<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGCINQZComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string BUSCOD C(6) 业务类型 @see<API DOC Appendix 4>
 * @property string BUSMOD C(5) 业务模式
 * @property string OPRDAT D 经办日
 * @property string EPTDAT D 期望日
 * @property string EPTTIM T 期望时间
 * @property string REQSTA C(3) 业务请求状态 @see<API DOC Appendix 5>
 * @property string RTNFLG C(1) 业务请求结果 @see<API DOC Appendix 6>
 * @property string OPRSTP C(6) 待处理操作步骤
 * @property string OPRSQN C(3) 待处理操作序列
 * @property string OPRALS Z(32) 操作别名
 * @property string LGNNAM Z(30) 用户登录名
 * @property string USRNAM Z(20) 用户姓名
 * @property string CTYNBR C(6) 业务受理城市号
 * @property string BRNNBR C(4) 业务受理部门号
 * @property string BBKNBR C(2) 业务受理分行号
 * @property string ACCNBR C(35) 帐号
 * @property string ACCNAM Z(62) 户名
 * @property string TRSNUM A(6) 交易笔数
 * @property string TOTAMT M 总金额
 * @property string CCYNBR C(2) 币种 @see<API DOC Appendix 3>
 * @property string CCYMKT C(1) 货币市场
 * @property string TRSTYP C(4) 交易类型
 * @property string SUCNUM N(6) 成功笔数
 * @property string SUCAMT M 成功金额
 * @property string NUSAGE Z(42) 用途
 * @property string YURREF C(30) 对方参考号
 * @property string STSCOD C(1) 记录状态
 * @property string ERRCOD C(7) 错误码
 * @property string ERRDSP Z(92) 错误描述
 * @property string SEQCOD C(10) 处理批号
 * @property string ATHFLG C(1) 附件标志Y/N
 * @property string RSV62Z C(42) 保留字42
 * @property string DMANBR C(20) 虚拟户编号
 */
class NTAGCINQZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTAGCINQZ';
    }
}