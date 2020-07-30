<?php


namespace leqee\CMBFirmBankSDK\api\Distribution;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCAGCX1Component;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTAGCDTLY1ComponentForRequest;
use leqee\CMBFirmBankSDK\api\Distribution\component\NTBUSMODYComponent;

/**
 * Class AgencyDeductionHandleRequest
 * @package leqee\CMBFirmBankSDK\api\Distribution
 * 大批量代扣经办
 * @version 5.37.0 - 4.8
 */
class AgencyDeductionHandleRequest extends BaseRequest
{
    /**
     * AgencyDeductionHandleRequest constructor.
     * @param string $loginName
     * @param string $businessMode
     * @param NTAGCAGCX1Component $handleRequest
     */
    public function __construct(string $loginName, string $businessMode, NTAGCAGCX1Component $handleRequest)
    {
        parent::__construct($loginName, 'NTAGCACL');
        $this->appendComponent(new NTBUSMODYComponent($businessMode));
        $this->appendComponent($handleRequest);
    }

    /**
     * @note 每批次最多上传 3000 笔
     * @param NTAGCDTLY1ComponentForRequest $handleItem
     * @return AgencyDeductionHandleRequest
     */
    public function addHandleItem(NTAGCDTLY1ComponentForRequest $handleItem){
        $this->appendComponent($handleItem);
        return $this;
    }
}
