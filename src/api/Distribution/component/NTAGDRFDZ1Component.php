<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTAGDRFDZ1Component
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string REQNBR C(10) 流程实例号
 * @property string YURREF C(30) 业务参考号
 * @property string BTHDTL C(8) 明细序号
 * @property string EACNBR C(35) 明细账户
 * @property string EACNAM Z(62) 明细账户名称
 * @property string TRSAMT S(15,2) 交易金额
 * @property string CPRACT C(20) 客户在商户账号
 * @property string TXTCLT Z(42) 客户摘要
 * @property string EACBNM Z(62) 明细账户开户行
 * @property string EACCTY Z(62) 明细账户开户地
 * @property string CPRCNV C(6) 商户协议号
 * @property string TRSDAT D 交易日期
 * @property string STSCOD C(1) 交易状态
 * @property string ERRCOD C(5) 退票失败代码
 * @property string RTNTXT Z(100) 退票附言
 * @property string RSV30Z C(30) 保留字30
 */
class NTAGDRFDZ1Component extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTAGDRFDZ1';
    }
}






