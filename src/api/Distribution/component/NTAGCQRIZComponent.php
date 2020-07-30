<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGCQRIZComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string YURREF C(30) 业务参考号
 * @property string TRXSEQ C(8) 交易序号
 * @property string ACCNBR C(35) 账号
 * @property string ACCNAM Z(62) 户名
 * @property string TRSAMT M 金额
 * @property string LGRAMT M 实际代扣金额
 * @property string TRSDSP Z(42) 注释
 * @property string STSCOD C(1) 记录状态
 * @property string ERRCOD C(7) 错误码
 * @property string ERRTXT Z(192) 错误信息
 * @property string BNKFLG C(1) 系统内标志
 * @property string EACBNK Z(62) 他行户口开户行
 * @property string EACCTY Z(62) 他行户口开户地
 * @property string FSTFLG C(1) 他行快速标志
 * @property string RCVBNK C(12) 他行户口联行号
 * @property string CPRACT C(20) 客户代码
 * @property string CPRREF C(20) 合作方流水号
 * @property string RSV30Z C(30) 保留字段30
 */
class NTAGCQRIZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTAGCQRIZ';
    }
}