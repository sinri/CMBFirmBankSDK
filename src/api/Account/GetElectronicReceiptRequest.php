<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\CSRRCFDFY0Component;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetElectronicReceiptRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询电子回单信息
 * @version 5.37.0 - 2.7
 */
class GetElectronicReceiptRequest extends BaseRequest
{
    /**
     * GetElectronicReceiptRequest constructor.
     * @param string $loginName
     * @param CSRRCFDFY0Component $queryComponent
     */
    public function __construct(string $loginName, CSRRCFDFY0Component $queryComponent)
    {
        parent::__construct($loginName, 'SDKCSFDFBRT');
        $this->appendComponent($queryComponent);
    }
}