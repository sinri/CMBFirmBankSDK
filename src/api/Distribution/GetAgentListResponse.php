<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGTLS2ZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAgentListResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询交易代码
 * @version 5.37.0 - 4.1
 */
class GetAgentListResponse extends BaseResponse
{
    /**
     * @var NTAGTLS2ZComponent[]
     */
    protected $agentList=[];

    /**
     * @return NTAGTLS2ZComponent[]
     */
    public function getAgentList(): array
    {
        return $this->agentList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTAGTLS2Z'){
            $this->agentList[]=new NTAGTLS2ZComponent($component);
        }
        // else: just ignore
    }
}