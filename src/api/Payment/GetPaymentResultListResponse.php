<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Payment\component\NTSTLLSTZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetPaymentResultListResponse
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 支付结果列表查询
 * @version 5.37.0 - 3.3
 */
class GetPaymentResultListResponse extends BaseResponse
{
    /**
     * @var NTSTLLSTZComponent[]
     */
    protected array $resultList = [];

    /**
     * @return NTSTLLSTZComponent[]
     */
    public function getResultList(): array
    {
        return $this->resultList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTSTLLSTZ') {
            $this->resultList[] = new NTSTLLSTZComponent($component);
        }
    }
}