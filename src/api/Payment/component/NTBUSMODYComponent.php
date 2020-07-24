<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\RequestComponent;

/**
 * Class NTBUSMODYComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string BUSMOD C(5) [optional] 业务模式 本查询与业务模式没有关系, 故业务模式字段可空且不同业务模式返回结果一样
 * @property string RSV50Z C(50) [optional] 保留字50
 */
class NTBUSMODYComponent extends RequestComponent
{
    public function getTagName(): string
    {
        return 'NTBUSMODY';
    }
}