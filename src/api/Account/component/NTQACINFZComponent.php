<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\BaseComponent;
use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class NTQACINFZComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string CCYNBR C(2,2) 币种
 * @property string C_CCYNBR Z(10) 币种名称
 * @property string ACCITM C(5,5) 科目
 * @property string BBKNBR C(2,2) 分行号
 * @property string ACCNBR C(35) 帐号
 * @property string ACCNAM Z(62) 注解 一般为户名
 * @property string ACCBLV M 上日余额 当 INTCOD='S'时，这个字段的值显示为"头寸额度(集团支付子公司余额)"是子公司的虚拟余额
 * @property string ONLBLV M 联机余额
 * @property string HLDBLV M 冻结余额
 * @property string AVLBLV M 可用余额
 * @property string LMTOVR M 透支额度
 * @property string STSCOD C(1) 状态 A=活动，B=冻结，C=关户
 * @property string INTCOD C(1) 利息码 S=子公司虚拟余额
 * @property string C_INTRAT C(11) 年利率
 * @property string INTRAT C(11) 年利率
 * @property string OPNDAT D 开户日 8 位数字
 * @property string MUTDAT D 到期日 8 位数字
 * @property string INTTYP C(3,3) 利率类型 @see <API DOC A.35 利率类型码>
 * @property string DPSTXT Z(12) 存期 定期时，取值: 一天 七天 一个月 三个月 六个月 一年 二年 三年 四年 五年
 */
class NTQACINFZComponent extends ResponseComponent
{

}