<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGDINFY1ComponentForRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string BTHNBR C(10) [optional] 续传批次号 不为空时必须跟流程实例号对应的批次号一致, 否则检查报错
 * @property string TRXSEQ C(8) [optional] 续传明细序号
 * @property string HISTAG C(1) [optional] 续传历史查询标志 Y/N
 */
class NTAGDINFY1ComponentForRequest extends RequestComponent
{
    /**
     * NTAGDINFY1ComponentForRequest constructor.
     * @param string $requestNo
     */
    public function __construct(string $requestNo)
    {
        $this->REQNBR = $requestNo;
    }


    public function getTagName(): string
    {
        return 'NTAGDINFY1';
    }

}