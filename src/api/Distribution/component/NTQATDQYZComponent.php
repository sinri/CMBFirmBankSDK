<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQATDQYZComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string ACCNBR C(1,35) 账号
 * @property string CLTNAM Z(1,20) 户名
 * @property string TRSAMT M 金额
 * @property string TRSDSP Z(20) [optional] 注释
 * @property string STSCOD C(1) 状态 S:成功;F:失败;C:撤消;I:数据录入
 * @property string ERRDSP  [optional] 结果描述
 * @property string BNKFLG C(1) [optional] 系统内标志 Y:开户行为招行;N:开户行为他行
 * @property string EACBNK Z(1,62) [optional] 他行户口开户行
 * @property string EACCTY Z(1,62) [optional] 他行户口开户地
 */
class NTQATDQYZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTQATDQYZ';
    }
}