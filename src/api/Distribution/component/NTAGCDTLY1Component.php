<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTAGCDTLY1Component
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string TRXSEQ C(8) 交易序号 客户自行保证批次范围内的序号唯一性
 * @property string ACCNBR C(35) 账号
 * @property string ACCNAM Z(62) 户名
 * @property string TRSAMT M 金额
 * @property string TRSDSP Z(42) [optional] 注释
 * @property string BNKFLG C(1) 系统内标志 Y:开户行是招商银行;N:开户行是他行 代扣不支持他行卡
 * @property string EACBNK Z(62) [optional] 他行户口开户行 他行必输
 * @property string EACCTY Z(62) [optional] 他行户口开户地 他行必输
 * @property string FSTFLG C(1) [optional] 他行快速标志 Y:快速;N:普通
 * @property string RCVBNK C(12) [optional] 他行户口联行号
 * @property string CPRACT C(20) [optional] 客户代码 以前代扣将合作方帐号填到注释字段里, 现在可以改为填到这个字段
 * @property string CPRREF C(20) [optional] 合作方流水号
 */
class NTAGCDTLY1Component extends RequestComponent
{
    /**
     * NTAGCDTLY1Component constructor.
     * @param string $transactionNo
     * @param string $account
     * @param string $accountName
     * @param string $amount
     * @param string $bankFlag
     */
    public function __construct($transactionNo, $account, $accountName, $amount, $bankFlag)
    {
        $this->TRXSEQ = $transactionNo;
        $this->ACCNBR = $account;
        $this->ACCNAM = $accountName;
        $this->TRSAMT = $amount;
        $this->BNKFLG = $bankFlag;
    }

    public function getTagName(): string
    {
        return 'NTAGCDTLY1';
    }
}