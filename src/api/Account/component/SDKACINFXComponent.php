<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\BaseComponent;
use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class SDKACINFXComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR N(2) 分行号 @see `CMBBranchDefinition::BRANCH_CODE_OF_*` 分行号和分行名称不能同时为空
 * @property string C_BBKNBR Z(1,62) Optional 分行名称
 * @property string ACCNBR C(1,35) 账号
 */
class SDKACINFXComponent extends RequestComponent
{
    public function __construct(string $bankBranch,string $account)
    {
        $this->BBKNBR=$bankBranch;
        $this->ACCNBR=$account;
    }

    public function getTagName(): string
    {
        return "SDKACLSTX";
    }
}