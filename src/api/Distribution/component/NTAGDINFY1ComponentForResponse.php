<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGDINFY1ComponentForResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string BTHNBR C(10) 续传批次号
 * @property string TRXSEQ C(8) 续传明细序号
 * @property string HISTAG C(1) [optional] 续传历史查询标志 Y/N
 */
class NTAGDINFY1ComponentForResponse extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTAGDINFY1';
    }
}