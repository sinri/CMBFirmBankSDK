<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTACCBBKZComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR C(2,2) 分行号 @see <API DOC Appendix 1>
 * @property string C_BBKNBR Z(62) 分行名称
 * @property string ACCNBR 帐号 C(35)
 */
class NTACCBBKZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTACCBBKZ';
    }
}