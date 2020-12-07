<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGDRFDZ1Component;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAgentRefundInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 代发退票明细查询
 * @version 5.37.0 - 4.12
 */
class GetAgentRefundInfoResponse extends BaseResponse
{
    /**
     * @var NTAGDRFDZ1Component[]
     */
    protected $refundInfoList = [];

    /**
     * @return NTAGDRFDZ1Component[]
     */
    public function getRefundInfoList(): array
    {
        return $this->refundInfoList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTAGDRFDZ1'){
            $this->refundInfoList[]=new NTAGDRFDZ1Component($component);
        }
        // else: just ignore
    }
}