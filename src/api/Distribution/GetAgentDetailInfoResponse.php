<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCDTLY1ComponentForResponse;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGDINFY1ComponentForResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetAgentDetailInfoResponse
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 查询大批量代发代扣明细信息
 * @version 5.37.0 - 4.9
 */
class GetAgentDetailInfoResponse extends BaseResponse
{
    /**
     * @var NTAGCDTLY1ComponentForResponse[]
     */
    protected $distributionDetailList=[];

    /**
     * @return NTAGCDTLY1ComponentForResponse[]
     */
    public function getDistributionDetailList(): array
    {
        return $this->distributionDetailList;
    }

    /**
     * @var NTAGDINFY1ComponentForResponse
     */
    protected $distributionDetailInfo;

    /**
     * @note 明细超过 1000 笔时返回
     * @return NTAGDINFY1ComponentForResponse
     */
    public function getDistributionDetailInfo()
    {
        return $this->distributionDetailInfo;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTAGCDTLY1') {
            $this->distributionDetailList[] = new NTAGCDTLY1ComponentForResponse($component);
        } elseif ($component->getElementTag() === 'NTAGDINFY1') {
            $this->distributionDetailInfo = new NTAGDINFY1ComponentForResponse($component);
        }
    }
}