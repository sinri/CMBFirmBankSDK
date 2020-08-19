<?php


namespace leqee\CMBFirmBankSDK\api\System\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQMDLSTZComponent
 * @package leqee\CMBFirmBankSDK\api\System\component
 * @property string BUSMOD C(5) 业务模式编号
 * @property string MODALS   业务模式名称
 */
class NTQMDLSTZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTQMDLSTZ';
    }
}