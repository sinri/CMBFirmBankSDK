<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGCDTLY1ComponentForRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string TRXSEQ C(8) 交易序号
 * @property string ACCNBR C(35) 账号
 * @property string ACCNAM Z(62) 户名
 * @property string TRSAMT M 金额
 * @property string LGRAMT M [optional] 实际代扣金额 仅供代扣查询明细时根据实际情况返回
 * @property string TRSDSP Z(42) [optional] 注释
 * @property string STSCOD C(1) [optional] 记录状态 A:待处理;C:取消(代发) 撤销(代扣);E:失败;I:待复核;S:成功
 * @property string ERRCOD C(7) [optional] 错误码
 * @property string ERRDSP  [optional] 错误描述
 * @property string ERRTXT Z(192) [optional] 错误信息 该字段目前返回为空, 请取 ERRDSP 查看错误描述
 * @property string BNKFLG C(1) [optional] 系统内标志
 * @property string EACBNK Z(62) [optional] 他行户口开户行
 * @property string EACCTY Z(62) [optional] 他行户口开户地
 * @property string FSTFLG C(1) [optional] 他行快速标志 Y:快速;N:普通
 * @property string RCVBNK C(12) [optional] 他行户口联行号
 * @property string CPRACT C(20) [optional] 客户代码
 * @property string CPRREF C(20) [optional] 合作方流水号
 */
class NTAGCDTLY1ComponentForResponse extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTAGCDTLY1';
    }
}