<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\NTACCBBKZComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

class GetBranchBankInfoResponse extends BaseResponse
{
    /**
     * @var NTACCBBKZComponent[]
     */
    protected $branchBankList=[];

    /**
     * @return NTACCBBKZComponent[]
     */
    public function getBranchBankList(): array
    {
        return $this->branchBankList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        $this->branchBankList[]=new NTACCBBKZComponent($component);
    }
}