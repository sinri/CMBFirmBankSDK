<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCINQZComponent;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCQRIZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAgentComprehensiveInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 代发代扣直连综合查询
 * @version 5.37.0 - 4.11
 */
class GetAgentComprehensiveInfoResponse extends BaseResponse
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

    /**
     * @var NTAGCQRIZComponent[]
     */
    protected array $agentInfoList2 = [];

    /**
     * @return NTAGCQRIZComponent[]
     */
    public function getAgentInfoList2()
    {
        return $this->agentInfoList2;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTAGCINQZ') {
            $this->agentInfoList[] = new NTAGCINQZComponent($component);
        } elseif ($component->getElementTag() === 'NTAGDINFY1') {
            $this->agentInfoList2[] = new NTAGCQRIZComponent($component);
        }
    }
}