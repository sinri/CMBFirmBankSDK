<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQPAYQYZComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string BUSCOD C(6) 业务代码 @see `BusinessCodeDefinition::CODE_OF_*`
 * @property string BUSMOD C(5) 业务模式
 * @property string DBTBBK C(2) 付方开户地区代码 @see <API DOC Appendix 1>
 * @property string DBTACC C(35) 付方账号 该账号币种类型必须与币种字段相符
 * @property string DBTNAM C(200) 付方帐户名
 * @property string DBTBNK Z(62) 付方开户行
 * @property string DBTADR Z(62) [optional] 付方行地址
 * @property string CRTBBK C(2) [optional] 收方开户地区代码 @see <API DOC Appendix 1>
 * @property string CRTACC C(35) 收方帐号 该帐号的币种类型必须与币种字段相符
 * @property string CRTNAM Z(200) 收方帐户名
 * @property string RCVBRD C(12) 收方大额行号 二代支付新增
 * @property string CRTBNK Z(62) [optional] 收方开户行
 * @property string CRTADR Z(62) [optional] 收方行地址
 * @property string GRPBBK C(2) [optional] 母公司开户地区代码 @see <API DOC Appendix 1>
 * @property string GRPACC C(35) [optional] 母公司帐号 只对集团支付有效
 * @property string GRPNAM Z(62) [optional] 母公司帐户名 只对集团支付有效
 * @property string CCYNBR C(2) 币种代码 @see<API DOC Appendix 3>
 * @property string TRSAMT M 交易金额
 * @property string EPTDAT D [optional] 企业银行客户端经办时指定的期望日期
 * @property string EPTTIM T [optional] 企业银行客户端经办时指定的期望时间 只有小时数有效
 * @property string BNKFLG C(1) [optional] 系统内外标志 'Y'表示系统内;'N'表示系统外
 * @property string REGFLG C(1) [optional] 同城异地标志 'Y'表示同城业务;'N'表示异地业务
 * @property string STLCHN C(1) [optional] 结算方式代码 N:普通;F:快速
 * @property string NUSAGE Z(28) [optional] 用途
 * @property string NTFCH1 C(36) [optional] 收方电子邮件
 * @property string NTFCH2 C(16) [optional] 收方移动电话
 * @property string OPRDAT D [optional] 经办日期
 * @property string YURREF C(30) 业务参考号 唯一性标识该笔业务的编号 "企业银行编号 + 业务类型 + 业务参考号"
 * @property string REQNBR C(10) [optional] 流程实例号
 * @property string BUSNAR Z(196) [optional] 业务摘要 用于企业付款时填写说明或者备注
 * @property string REQSTS C(3) 业务请求状态代码 @see <API DOC Appendix 5>
 * @property string RTNFLG C(1) [optional] 业务处理结果代码 @see <API DOC Appendix 6>
 * @property string OPRALS Z(28) [optional] 操作别名
 * @property string RTNNAR Z(88) [optional] 结果摘要 支付结算业务处理的结果描述
 * @property string RTNDAT D [optional] 退票日期
 * @property string ATHFLG C(1) [optional] 是否有附件信息 Y=有附件;N=无附件
 * @property string LGNNAM Z(30) [optional] 经办用户登录名
 * @property string USRNAM Z(30) [optional] 经办用户姓名
 * @property string TRSTYP C(6) [optional] 业务种类
 * @property string FEETYP C(1) [optional] 收费方式 N=不收费;Y=收费
 * @property string RCVTYP C(1) [optional] 收方公私标志 A=对公;P=个人;X=信用卡
 * @property string BUSSTS C(1) [optional] 汇款业务状态 A=待提出;C=已撤销;D=已删除;P=已提出;R=已退票;W=待处理(待确认)
 * @property string TRSBRN C(6) [optional] 受理机构
 * @property string TRNBRN C(6) [optional] 转汇机构
 * @property string RSV30Z C(30) [optional] 保留字段 虚拟户支付时, 前 10 位填虚拟户编号
 */
class NTQPAYQYZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTQPAYQYZ';
    }
}