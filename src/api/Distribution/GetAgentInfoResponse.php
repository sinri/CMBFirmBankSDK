<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCINQZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAgentInfoRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询交易概要信息
 * @version 5.37.0 - 4.3
 */
class GetAgentInfoResponse extends BaseResponse
{
    /**
     * @var NTAGCINQZComponent[]
     */
    protected array $agentInfoList = [];

    /**
     * @return NTAGCINQZComponent[]
     */
    public function getAgentInfoList(): array
    {
        return $this->agentInfoList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTAGCINQZ'){
            $this->agentInfoList[]=new NTAGCINQZComponent($component);
        }
        // else: just ignore
    }
}