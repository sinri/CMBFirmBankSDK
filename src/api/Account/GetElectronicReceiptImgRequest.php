<?php


namespace leqee\CMBFirmBankSDK\api\Account;


use leqee\CMBFirmBankSDK\api\Account\component\CSRRCFDFY0Component;
use leqee\CMBFirmBankSDK\api\Basement\BaseRequest;

/**
 * Class GetElectronicReceiptImgRequest
 * @package leqee\CMBFirmBankSDK\api\Account
 * 查询电子回单信息(保存图片)
 * @version 5.37.0 - 2.8
 */
class GetElectronicReceiptImgRequest extends BaseRequest
{
    /**
     * GetElectronicReceiptImgRequest constructor.
     * @param string $loginName
     * @param CSRRCFDFY0Component $queryComponent
     */
    public function __construct(string $loginName, CSRRCFDFY0Component $queryComponent)
    {
        parent::__construct($loginName, 'SDKCSFDFBRTIMG');
        $this->appendComponent($queryComponent);
    }
}