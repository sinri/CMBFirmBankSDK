<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQTSINFZComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string ETYDAT D Transaction Occurring Date
 * @property string ETYTIM T Transaction Occurring Time, only HOUR available
 * @property string VLTDAT D [optional] 起息日
 * @property string TRSCOD C(8) [optional] 交易类型 @see <API DOC Appendix 9>
 * @property string NARYUR Z(62) [optional] 摘要 若为企业银行客户端经办的交易，则该字段为用途信息(4.0 版代发代扣业务除外)。若为其它渠道经办的交易，则该字段为交易的简单说明和注解。
 * @property string TRSAMT M 交易金额
 * @property string C_TRSAMT M 交易金额
 * @property string TRSAMTD M [optional] 借方金额 企业为借方时的交易金额(正数)
 * @property string C_TRSAMTD M [optional] 借方金额
 * @property string TRSAMTC M [optional] 贷方金额 企业为贷方时的交易金额(正数)
 * @property string C_TRSAMTC M [optional] 贷方金额
 * @property string AMTCDR C(1) 借贷标记 C:贷;D:借
 * @property string TRSBLV M [optional] 余额 帐户的联机余额
 * @property string REFNBR C(15) 银行会计系统交易流水号
 * @property string REQNBR N(10) [optional] 流程实例号 企业银行交易序号，唯一标示企业银行客户端发起的一笔交易
 * @property string BUSNAM Z(32) [optional] 业务名称
 * @property string NUSAGE Z(62) [optional] 用途
 * @property string YURREF C(30) [optional] 业务参考号 企业银行客户端录入的业务参考号。用企业银行做的交易会有业务参考号，没有票据号，在柜台或其它地方生成的交易有票据号或其它的唯一标识，都统一称为业务参考号
 * @property string BUSNAR Z(200) [optional] 业务摘要 对业务的简单说明或注解。企业银行客户端录入的摘要信息
 * @property string OTRNAR Z(62) [optional] 其它摘要 对业务的其它说明或注解(暂不使用)
 * @property string C_RPYBBK C(12) [optional] 收/付方开户地区 收/付方帐号开户行所在地区，如北京、上海、深圳等
 * @property string RPYNAM Z(62) [optional] 收/付方名称
 * @property string RPYACC N(35) [optional] 收/付方帐号
 * @property string RPYBBN C(20) [optional] 收/付方开户行行号
 * @property string RPYBNK Z(62) [optional] 收/付方开户行名
 * @property string RPYADR Z(62) [optional] 收/付方开户行地址
 * @property string C_GSBBBK C(12) [optional] 母/子公司所在地区 母/子公司帐号的开户行所在地区，如北京、上海、深圳等
 * @property string GSBACC C(35) [optional] 母/子公司帐号
 * @property string GSBNAM Z(62) [optional] 母/子公司名称
 * @property string INFFLG N(1) [optional] 信息标志 用于标识收/付方帐号和母/子公司的信息。为空表示付方帐号和子公司;为“1”表示收方帐号和子公司; 为“2”表示收方帐号和母公司;为“3”表示原收方帐号和子公司
 * @property string ATHFLG C(1) [optional] 有否附件信息标志 Y/N
 * @property string CHKNBR C(20) [optional] 票据号
 * @property string RSVFLG C(1) [optional] 冲帐标志 *为冲帐，X为补帐 (冲账交易与原 交易借贷相反)
 * @property string NAREXT Z(34) [optional] 扩展摘要
 * @property string TRSANL C(6) [optional] 交易分析码 1-2位取值含义 @see <附录 A.8> ，3-6位取值含义 @see <附录 A.9>。建议:该字段取值后台没有统一标准，所以附录 A.8 和 A.9 不易公开发表。 如有客户需要区分不同交易，再根据具体情况提供取值范围。
 * @property string REFSUB C(1,50) [optional] 商务支付订单号 由商务支付订单产生
 * @property string FRMCOD N(10) [optional] 企业识别码 开通收方识别功能的账户可以通过此码识别付款方
 */
class NTQTSINFZComponent extends ResponseComponent
{

    public function getTagName(): string
    {
        return 'NTQTSINFZ';
    }
}