<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTQATDQYZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAgentDetailResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询交易明细信息
 * @version 5.37.0 - 4.4
 */
class GetAgentDetailResponse extends BaseResponse
{
    /**
     * @var NTQATDQYZComponent[]
     */
    protected $agentDetailList = [];

    /**
     * @return NTQATDQYZComponent[]
     */
    public function getAgentDetailList(): array
    {
        return $this->agentDetailList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTQATDQYZ'){
            $this->agentDetailList[]=new NTQATDQYZComponent($component);
        }
        // else: just ignore
    }
}