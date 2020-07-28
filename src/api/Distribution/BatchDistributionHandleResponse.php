<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCAGCZ1Component;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class BatchDistributionHandleResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 大批量代发经办
 * @version 5.37.0 - 4.7
 */
class BatchDistributionHandleResponse extends BaseResponse
{
    /**
     * @var NTAGCAGCZ1Component
     */
    protected $handleResult;

    /**
     * @return NTAGCAGCZ1Component
     */
    public function getHandleResult()
    {
        return $this->handleResult;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        $this->handleResult = new NTAGCAGCZ1Component($component);
    }
}