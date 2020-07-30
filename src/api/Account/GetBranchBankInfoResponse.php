<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTACCBBKZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetBranchBankInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询分行号信息
 * @version 5.37.0 - 2.6
 */
class GetBranchBankInfoResponse extends BaseResponse
{
    /**
     * @var NTACCBBKZComponent[]
     */
    protected $branchBankList = [];

    /**
     * @return NTACCBBKZComponent[]
     */
    public function getBranchBankList(): array
    {
        return $this->branchBankList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTACCBBKZ') {
            $this->branchBankList[] = new NTACCBBKZComponent($component);
        }
    }
}