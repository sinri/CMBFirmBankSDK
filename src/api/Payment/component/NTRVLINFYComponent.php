<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTRVLINFYComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string CRTSQN C(20) 收方编号
 * @property string CRTBBK C(2) [optional] 收方分行号
 * @property string CRTACC C(35) 收方帐号
 * @property string CRTNAM Z(62) 收方帐户名
 * @property string CRTBNK Z(62) 收方开户行
 * @property string CRTPVC Z(18) [optional] 收方省份
 * @property string CRTCTY Z(22) [optional] 收方城市
 * @property string CRTDTR Z(22) [optional] 收方县/区
 * @property string NTFCH1 C(40) [optional] 收方电子邮件
 * @property string NTFCH2 C(20) [optional] 收方移动电话
 * @property string STLCHN C(1) [optional] 提出方式
 * @property string STLNBR C(10) [optional] 提出代码
 * @property string LMTAMT M [optional] 额度
 * @property string OPRTYP C(1) [optional] 操作类型
 * @property string RSV30Z Z(30) [optional] 保留字段
 */
class NTRVLINFYComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTRVLINFY';
    }
}