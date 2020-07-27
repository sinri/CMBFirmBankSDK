<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGTLS2XComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BUSCOD C(6) 业务代码 N03020:代发;N03030:代扣;
 * @property string ACCNBR C(35) 账户
 * @property string CCYNBR C(2) [optional] 币种 @see<API DOC Appendix 3>
 * @property string STSCOD C(1) [optional] 协议状态 A:有效;C:关闭 默认为A
 */
class NTAGTLS2XComponent extends RequestComponent
{
    /**
     * NTAGTLS2XComponent constructor.
     * @param string $businessCode
     * @param string $account
     */
    public function __construct(string $businessCode, string $account)
    {
        $this->BUSCOD=$businessCode;
        $this->ACCNBR=$account;
    }


    public function getTagName(): string
    {
        return 'NTAGTLS2X';
    }
}