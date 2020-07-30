<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGCQRIYComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BUSCOD C(6) 业务类型
 * @property string YURREF C(30) 业务参考号
 * @property string BTHNBR C(10) [optional] 续传批次号
 * @property string TRXSEQ C(8) [optional] 续传明细序号
 * @property string HISTAG C(1) [optional] 续传历史查询标志
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTAGCQRIYComponent extends RequestComponent
{
    /**
     * NTAGCQRIYComponent constructor.
     * @param string $businessCode
     * @param string $referenceNo
     */
    public function __construct(string $businessCode, string $referenceNo)
    {
        $this->BUSCOD = $businessCode;
        $this->YURREF = $referenceNo;
    }


    public function getTagName(): string
    {
        return 'NTAGCQRIY';
    }
}