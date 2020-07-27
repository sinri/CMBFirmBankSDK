<?php


namespace leqee\CMBFirmBankSDK\api\Account\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTQADINFXComponent
 * @package leqee\CMBFirmBankSDK\api\Account\component
 * @property string BBKNBR N(2) 分行号 @see `CMBBranchDefinition::BRANCH_CODE_OF_*` 分行号和分行名称不能同时为空
 * @property string ACCNBR C(1,35) 账号
 */
class NTQADINFXComponent extends RequestComponent
{
    public function __construct(string $bankBranch, string $account)
    {
        $this->BBKNBR = $bankBranch;
        $this->ACCNBR = $account;
    }

    public function getTagName(): string
    {
        return "NTQADINFX";
    }
}