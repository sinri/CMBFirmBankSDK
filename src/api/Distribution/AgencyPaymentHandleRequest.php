<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCAGCX1Component;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCDTLY1ComponentForRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTBUSMODYComponent;

/**
 * Class AgencyPaymentHandleRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 大批量代发经办
 * @version 5.37.0 - 4.7
 */
class AgencyPaymentHandleRequest extends BaseRequest
{
    /**
     * AgencyPaymentHandleRequest constructor.
     * @param string $loginName
     * @param string $businessMode
     * @param NTAGCAGCX1Component $handleRequest
     */
    public function __construct(string $loginName, string $businessMode, NTAGCAGCX1Component $handleRequest)
    {
        parent::__construct($loginName, 'NTAGCAPY');
        $this->appendComponent(new NTBUSMODYComponent($businessMode));
        $this->appendComponent($handleRequest);
    }

    /**
     * @note 每批次最多上传 3000 笔
     * @param NTAGCDTLY1ComponentForRequest $handleItem
     * @return AgencyPaymentHandleRequest
     */
    public function addHandleItem(NTAGCDTLY1ComponentForRequest $handleItem){
        $this->appendComponent($handleItem);
        return $this;
    }
}