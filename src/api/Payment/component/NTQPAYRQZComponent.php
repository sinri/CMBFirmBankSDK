<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQPAYRQZComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string SQRNBR C(10) [optional] 流水号 批量经办时用来表示第几笔记录
 * @property string YURREF C(30) [optional] 业务参考号
 * @property string REQNBR C(10) [optional] 流程实例号
 * @property string REQSTS C(3) 业务请求状态 @see <API DOC Appendix 5>
 * @property string RTNFLG C(1) [optional] 业务处理结果 @see <API DOC Appendix 6> REQSTS=FIN 时, RTNFLG 才有意义
 * @property string OPRSQN C(3) [optional] 待处理操作序列
 * @property string OPRALS C(32) [optional] 操作别名
 * @property string ERRCOD C(7) [optional] 错误码
 * @property string ERRTXT Z(256) [optional] 错误文本
 */
class NTQPAYRQZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTQPAYRQZ';
    }
}