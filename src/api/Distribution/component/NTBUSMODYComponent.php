<?php


namespace leqee\CMBFirmBankSDK\api\Distribution\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTBUSMODYComponent
 * @package leqee\CMBFirmBankSDK\api\Distribution\component
 * @property string BUSMOD C(5) 业务模式
 */
class NTBUSMODYComponent extends RequestComponent
{
    /**
     * NTBUSMODYComponent constructor.
     * @param string $businessMode
     */
    public function __construct(string $businessMode)
    {
        $this->BUSMOD = $businessMode;
    }


    public function getTagName(): string
    {
        return 'NTBUSMODY';
    }
}