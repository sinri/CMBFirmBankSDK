<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\BaseComponent;
use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class NTQACLSTZComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string CCYNBR 币种 C(2,2) `CurrencyCodeDefinition::CODE_OF_*`
 * @property string BBKNBR 分行号 C(2,2) `CMBBranchDefinition::BRANCH_CODE_OF_*`
 * @property string ACCNBR 帐号 C(35)
 * @property string ACCNAM 户名 Z(62)
 * @property string C_RELNBR 公司名称 Z(62)
 */
class NTQACLSTZComponent extends ResponseComponent
{

}