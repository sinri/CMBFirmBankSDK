<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTREQNBRYComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class DirectAgentResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 直接代发代扣
 * @version 5.37.0 - 4.2
 */
class DirectAgentResponse extends BaseResponse
{
    /**
     * @var NTREQNBRYComponent
     */
    protected $distributionResult;

    /**
     * @return NTREQNBRYComponent
     */
    public function getDistributionResult()
    {
        return $this->distributionResult;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        $this->distributionResult = new NTREQNBRYComponent($component);
    }
}