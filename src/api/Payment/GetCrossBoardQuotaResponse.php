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
    protected $crossBoardBankInfoList=[];

    /**
     * @var NTCRBINQZ2Component[]
     */
    protected $crossBoardBankInfoList2=[];


    /**
     * @return NTCRBINQZComponent[]
     */
    public function getCrossBoardBankInfoList(): array
    {
        return $this->crossBoardBankInfoList;
    }

    /**
     * @return NTCRBINQZ2Component[]
     */
    public function getCrossBoardBankInfoList2(): array
    {
        return $this->crossBoardBankInfoList2;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        if($component->getElementTag()==='NTCRBINQZ'){
            $this->crossBoardBankInfoList[]=new NTCRBINQZComponent($component);
        } elseif ($component->getElementTag()==='NTCRBINQZ2'){
            $this->crossBoardBankInfoList2[]=new NTCRBINQZ2Component($component);
        }
    }
}