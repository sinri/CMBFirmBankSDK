<?php


namespace leqee\CMBFirmBankSDK\api\Payment;


use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;
use leqee\CMBFirmBankSDK\api\Payment\component\NTBUSMODYComponent;

/**
 * Class GetCrossBoardQuotaRequest
 * @package leqee\CMBFirmBankSDK\api\Payment
 * 跨境划拨额度查询
 * @version 5.37.0 - 3.10
 */
class GetCrossBoardQuotaRequest extends BaseRequest
{
    /**
     * GetCrossBoardQuotaRequest constructor.
     * @param string $loginName
     * @param NTBUSMODYComponent $queryComponent
     */
    public function __construct(string $loginName, NTBUSMODYComponent $queryComponent)
    {
        parent::__construct($loginName, 'NTCRBINQ');
        $this->appendComponent($queryComponent);
    }
}