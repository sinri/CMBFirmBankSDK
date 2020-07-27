<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTREQNBRYComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string RSV50Z C(50) 保留字段 若输入接口 SDKATSRQX 字段 GRTFLG 为'Y', 则经办成功时本字段前3位返回——数据接收中'OPR';
 * 若输入接口 SDKATSRQX 字段 GRTFLG 值非'Y', 则经办成功时本字段前3位返回——银行处理中'BNK'
 */
class NTREQNBRYComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTREQNBRY';
    }
}