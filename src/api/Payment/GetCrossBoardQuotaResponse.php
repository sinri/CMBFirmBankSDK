<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use leqee\CMBFirmBankSDK\api\Payment\component\NTCRBINQZ2Component;
use leqee\CMBFirmBankSDK\api\Payment\component\NTCRBINQZComponent;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetCrossBoardQuotaResponse
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 跨境划拨额度查询
 * @version 5.37.0 - 3.10
 */
class GetCrossBoardQuotaResponse extends BaseResponse
{
    /**
     * @var NTCRBINQZComponent[]
     */
    protected $crossBoardBankList=[];

    /**
     * @var NTCRBINQZ2Component[]
     */
    protected $crossBoardBankInfo=[];

    /**
     * @return NTCRBINQZComponent[]
     */
    public function getCrossBoardBankList(): array
    {
        return $this->crossBoardBankList;
    }

    /**
     * @return NTCRBINQZ2Component[]
     */
    public function getCrossBoardBankInfo(): array
    {
        return $this->crossBoardBankInfo;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTCRBINQZ'){
            $this->crossBoardBankList[]=new NTCRBINQZComponent($component);
        } elseif ($component->getElementTag()==='NTCRBINQZ2'){
            $this->crossBoardBankInfo[]=new NTCRBINQZ2Component($component);
        }
    }
}