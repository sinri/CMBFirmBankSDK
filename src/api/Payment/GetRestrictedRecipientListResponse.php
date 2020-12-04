<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Payment\component\NTQRYRVLZComponent;
use leqee\CMBFirmBankSDK\api\Payment\component\NTRVLINFYComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetRestrictedRecipientListResponse
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 查询收方限制列表
 * @version 5.37.0 - 3.4
 */
class GetRestrictedRecipientListResponse extends BaseResponse
{
    /**
     * @var NTRVLINFYComponent[]
     */
    protected array $recipientList = [];

    /**
     * @var NTQRYRVLZComponent
     */
    protected NTQRYRVLZComponent $operationInfo;

    /**
     * @return NTRVLINFYComponent[]
     */
    public function getRecipientList(): array
    {
        return $this->recipientList;
    }

    /**
     * @return NTQRYRVLZComponent
     */
    public function getOperationInfo()
    {
        return $this->operationInfo;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTRVLINFY') {
            $this->recipientList[] = new NTRVLINFYComponent($component);
        } elseif ($component->getElementTag() === 'NTQRYRVLZ') {
            $this->operationInfo = new NTQRYRVLZComponent($component);
        }
    }
}