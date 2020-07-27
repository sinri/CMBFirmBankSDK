<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKATDRQXComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string ACCNBR C(1,35) 收款账号/被扣款账号 旧版一卡通应包含4位分行地区码和8位卡号;存折必须加4位分行地区码 代扣不支持他行卡
 * @property string CLTNAM Z(1,62) 户名
 * @property string TRSAMT M 金额
 * @property string BNKFLG C(1) [optional] 系统内标志 Y/空值:开户行是招商银行;N:开户行是他行
 * @property string EACBNK Z(1,62) [optional] 他行户口开户行 当 BNKFLG=N 时必填
 * @property string EACCTY Z(1,62) [optional] 他行户口开户地 当 BNKFLG=N 时必填
 * @property string TRSDSP Z(1,20) [optional] 注释 签订有代扣协议, 必须填写与代扣协议一致的合作方账号(该号为扣款方的客户标识 ID)
 */
class SDKATDRQXComponent extends RequestComponent
{
    /**
     * NTPAYQYBY1Component constructor.
     * @param string $account
     * @param string $depositor
     * @param string $amount
     */
    public function __construct(string $account,string $depositor,string $amount)
    {
        $this->ACCNBR=$account;
        $this->CLTNAM=$depositor;
        $this->TRSAMT=$amount;
    }


    public function getTagName(): string
    {
        return 'SDKATDRQX';
    }
}