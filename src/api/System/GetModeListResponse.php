<?php


namespace leqee\CMBFirmBankSDK\api\System;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\System\component\NTQMDLSTZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetModeListResponse
 * @package leqee\CMBFirmBankSDK\api\System
 * 查询可经办的业务模式信息
 * @version 5.37.0 - 1.4
 */
class GetModeListResponse extends BaseResponse
{
    /**
     * @var NTQMDLSTZComponent[]
     */
    protected array $businessModeList = [];

    /**
     * @return NTQMDLSTZComponent[]
     */
    public function getBusinessModeList(): array
    {
        return $this->businessModeList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if ($component->getElementTag() === 'NTQMDLSTZ') {
            $this->businessModeList[] = new NTQMDLSTZComponent($component);
        }
        // else: just ignore
    }
}