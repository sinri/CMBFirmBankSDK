<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;

/**
 * Class TransactionTypeDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement
 * @see <API DOC 5.37.0 附录 A.45>
 * 部分代发代扣交易类型
 */
class TransactionTypeDefinition
{
    const TYPE_OF_BYSA = 'BYSA'; // 代发工资
    const TYPE_OF_AYTX = 'AYTX'; // 代扣税费
    const TYPE_OF_AYBK = 'AYBK'; // 代扣其他
    const TYPE_OF_BYXG = 'BYXG'; // 代发交通费
    const TYPE_OF_BYXF = 'BYXF'; // 代发差旅费
    const TYPE_OF_BYXB = 'BYXB'; // 代发住房公积金
    const TYPE_OF_BYBK = 'BYBK'; // 代发其他
    const TYPE_OF_BYBI = 'BYBI'; // 代发纳税退还
    const TYPE_OF_BYWK = 'BYWK'; // 代发加班费
    const TYPE_OF_BYTF = 'BYTF'; // 代发报销款
}