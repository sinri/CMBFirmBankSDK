<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\ABFEEPRTZ1Component;
use leqee\CMBFirmBankSDK\api\Account\component\AGFEERRCZ1Component;
use leqee\CMBFirmBankSDK\api\Account\component\AGFEERRCZ2Component;
use leqee\CMBFirmBankSDK\api\Account\component\AGNCBPAYZ1Component;
use leqee\CMBFirmBankSDK\api\Account\component\CPRRCRCVX1Component;
use leqee\CMBFirmBankSDK\api\Account\component\CPRRCRTNX1Component;
use leqee\CMBFirmBankSDK\api\Account\component\CPRRCSNDX1Component;
use leqee\CMBFirmBankSDK\api\Account\component\CSRRCFDFZ1Component;
use leqee\CMBFirmBankSDK\api\Account\component\CSTRFPRTX0Component;
use leqee\CMBFirmBankSDK\api\Basement\BaseResponse;
use sinri\ark\xml\entity\ArkXMLElement;

/**
 * Class GetElectronicReceiptResponse
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询电子回单信息
 * @version 5.37.0 - 2.7
 */
class GetElectronicReceiptResponse extends BaseResponse
{
    /**
     * @var CSRRCFDFZ1Component[]
     */
    protected array $totalReceiptList = [];

    /**
     * @var CSTRFPRTX0Component[]
     */
    protected array $paymentReceiptList = [];

    /**
     * @var AGNCBPAYZ1Component[]
     */
    protected array $agencyPaymentReceiptList = [];

    /**
     * @var ABFEEPRTZ1Component[]
     */
    protected array $deductionReceiptList = [];

    /**
     * @var AGFEERRCZ1Component[]
     */
    protected array $chargeReceiptList1 = [];

    /**
     * @var AGFEERRCZ2Component[]
     */
    protected array $chargeReceiptList2  = [];

    /**
     * @var CPRRCSNDX1Component[]
     */
    protected array $publicPaymentReceiptList  = [];

    /**
     * @var CPRRCRCVX1Component[]
     */
    protected array $publicChargeReceiptList  = [];

    /**
     * @var CPRRCRTNX1Component[]
     */
    protected array $publicRefundReceiptList  = [];

    /**
     * @return CSRRCFDFZ1Component[]
     */
    public function getTotalReceiptList(): array
    {
        return $this->totalReceiptList;
    }

    /**
     * @return CSTRFPRTX0Component[]
     */
    public function getPaymentReceiptList(): array
    {
        return $this->paymentReceiptList;
    }

    /**
     * @return AGNCBPAYZ1Component[]
     */
    public function getAgencyPaymentReceiptList(): array
    {
        return $this->agencyPaymentReceiptList;
    }

    /**
     * @return ABFEEPRTZ1Component[]
     */
    public function getDeductionReceiptList(): array
    {
        return $this->deductionReceiptList;
    }

    /**
     * @return AGFEERRCZ1Component[]
     */
    public function getChargeReceiptList1(): array
    {
        return $this->chargeReceiptList1;
    }

    /**
     * @return AGFEERRCZ2Component[]
     */
    public function getChargeReceiptList2(): array
    {
        return $this->chargeReceiptList2;
    }

    /**
     * @return CPRRCSNDX1Component[]
     */
    public function getPublicPaymentReceiptList(): array
    {
        return $this->publicPaymentReceiptList;
    }

    /**
     * @return CPRRCRCVX1Component[]
     */
    public function getPublicChargeReceiptList(): array
    {
        return $this->publicChargeReceiptList;
    }

    /**
     * @return CPRRCRTNX1Component[]
     */
    public function getPublicRefundReceiptList(): array
    {
        return $this->publicRefundReceiptList;
    }

    protected function loadOtherComponent(ArkXMLElement $component)
    {
        switch ($component->getElementTag()){
            case 'CSRRCFDFZ1':
                $this->totalReceiptList[] = new CSRRCFDFZ1Component($component);
                break;
            case 'CSTRFPRTX0':
                $this->paymentReceiptList[] = new CSTRFPRTX0Component($component);
                break;
            case 'AGNCBPAYZ1':
                $this->agencyPaymentReceiptList[] = new AGNCBPAYZ1Component($component);
                break;
            case 'ABFEEPRTZ1':
                $this->deductionReceiptList[] = new ABFEEPRTZ1Component($component);
                break;
            case 'AGFEERRCZ1':
                $this->chargeReceiptList1[] = new AGFEERRCZ1Component($component);
                break;
            case 'AGFEERRCZ2':
                $this->chargeReceiptList2[] = new AGFEERRCZ2Component($component);
                break;
            case 'CPRRCSNDX1':
                $this->publicPaymentReceiptList[] = new CPRRCSNDX1Component($component);
                break;
            case 'CPRRCRCVX1':
                $this->publicChargeReceiptList[] = new CPRRCRCVX1Component($component);
                break;
            case 'CPRRCRTNX1':
                $this->publicRefundReceiptList[] = new CPRRCRTNX1Component($component);
                break;
        }
    }
}