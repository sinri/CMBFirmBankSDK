<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTSTLLSTZComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string REQNBR C(10) 流程实例号
 * @property string BUSCOD C(6) 业务编码 @see `BusinessCodeDefinition::CODE_OF_*`
 * @property string BUSMOD C(5) 业务模式
 * @property string DBTBBK C(2) 转出分行号 @see <API DOC Appendix 1>
 * @property string DBTACC C(35) 付方账号
 * @property string CRTBBK C(2) 收方分行号 @see <API DOC Appendix 1>
 * @property string CRTACC C(35) 收方帐号
 * @property string CRTNAM Z(122) 收方名称
 * @property string CCYNBR C(2) 币种 @see<API DOC Appendix 3>
 * @property string TRSAMT M 交易金额
 * @property string EPTDAT D 期望日
 * @property string EPTTIM T 期望时间
 * @property string OPRDAT D 经办日
 * @property string YURREF C(30) 对方参考号
 * @property string REQSTS C(3) 请求状态 @see <API DOC Appendix 5>
 * @property string RTNFLG C(1) 业务处理结果 @see <API DOC Appendix 6>
 * @property string ATHFLG C(1) 是否有附件信息
 * @property string RSV30Z C(30) 保留字段
 */
class NTSTLLSTZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTSTLLSTZ';
    }
}