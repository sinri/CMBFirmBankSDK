<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQRYRVLZComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR C(2) 分行号 @see <API DOC Appendix 1>
 * @property string ACCNBR 帐号 C(35)
 * @property string TRSDAT 交易日期 D
 * @property string BALAMT 可用余额 M
 * @property string RSV30Z 保留字段 C(30)
 */
class NTQABINFZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTQABINFZ';
    }
}