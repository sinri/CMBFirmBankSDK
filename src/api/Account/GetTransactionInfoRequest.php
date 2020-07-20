<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\SDKTSINFXComponent;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

class GetTransactionInfoRequest extends BaseRequest
{
    /**
     * GetTransactionInfoRequest constructor.
     * @param string $loginName
     * @param SDKTSINFXComponent $queryComponent
     */
    public function __construct(string $loginName, SDKTSINFXComponent $queryComponent)
    {
        parent::__construct($loginName, 'GetTransInfo');
        $this->appendComponent($queryComponent);
    }
}