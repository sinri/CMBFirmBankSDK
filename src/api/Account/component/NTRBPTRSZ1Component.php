<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTRBPTRSZ1Component
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string COTFLG C(1) 未传完标记
 * @property string TRSSEQ C(9) 末位记账序号 如 CotFlg 为'Y', 下一次查询输入接口记账序号字段填入此序号+1
 * @property string DBTNBR C(5) 借方笔数 本次查询查到的借记的笔数
 * @property string DBTAMT M 借方金额 本次查询查到的借记的金额汇总
 * @property string CRTNBR C(2) 贷方笔数 本次查询查到的贷记的笔数
 * @property string CRTAMT M 贷方金额 本次查询查到的贷记的金额汇总
 */
class NTRBPTRSZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTRBPTRSZ1';
    }
}