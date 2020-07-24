<?php


namespace leqee\CMBFirmBankSDK\api\Payment\component;


use leqee\CMBFirmBankSDK\XmlBuilder\ResponseComponent;

/**
 * Class NTQRYRVLZComponent
 * @package leqee\CMBFirmBankSDK\api\Payment\component
 * @property string OPRLGN Z(30) 经办用户名
 * @property string OPRDAT D 经办日期
 * @property string CHKSUM C(10) 校验和
 **/
class NTQRYRVLZComponent extends ResponseComponent
{
    public function getTagName(): string
    {
        return 'NTQRYRVLZ';
    }
}