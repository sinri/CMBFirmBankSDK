<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;

/**
 * Class BusinessRequestStatusDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement\definition
 * @see <API DOC 5.37.0 附录 A.5>
 * 业务请求状态
 * <REQSTS>FIN</REQSTS> FIN明确业务已完成，搭配<RTNFLG>S</RTNFLG> 标识完成的状态。
 */
class BusinessRequestStatusDefinition
{
    const CODE_OF_APPROVING = 'AUT'; // 等待审批
    const CODE_OF_APPROVED_FINALLY = 'NTE'; // 终审完毕
    const CODE_OF_ORDER_CONFIRMING = 'WCF'; // 订单待确认（商务支付用）
    const CODE_OF_BANK_PROCESSING = 'BNK'; // 银行处理中
    const CODE_OF_FIN = 'FIN'; // 完成
    const CODE_OF_CONFIRMING = 'ACK'; // 等待确认(委托贷款用)
    const CODE_OF_BANK_CONFIRMING = 'APD'; // 待银行确认(国际业务用)
    const CODE_OF_DATA_RECEIVING = 'OPR'; // 数据接收中（代发）
}