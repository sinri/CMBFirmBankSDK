<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;

/**
 * Class BusinessResultDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement\definition
 * @see <API DOC 5.37.0 附录 A.6>
 * 业务处理结果
 */
class BusinessResultDefinition
{

    const CODE_OF_PAY_SUCCESS = 'S'; // 成功	银行支付成功
    const CODE_OF_PAY_FAILED = 'F'; // 失败	银行支付失败
    const CODE_OF_BILL_RETURNED = 'B'; // 退票	银行支付被退票
    const CODE_OF_FIRM_REFUSED = 'R'; // 否决	企业审批否决
    const CODE_OF_FIRM_EXPIRED = 'D'; // 过期	企业过期不审批
    const CODE_OF_FIRM_CANCELLED = 'C'; // 撤消	企业撤销
    const CODE_OF_MERCHANT_CANCELLED = 'M'; // 商户撤销订单	商务支付
    const CODE_OF_LOAN_REFUSED = 'V'; // 拒绝	委托贷款被借款方拒绝
    const CODE_OF_USE_CREDIT = 'U'; // 银行挂账
    const CODE_OF_REFUND = 'T'; // 退款
}