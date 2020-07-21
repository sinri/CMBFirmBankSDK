<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;

/**
 * Class ServiceCodeDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement
 * @see <API DOC 5.37.0 附录 A.4>
 */
class BusinessCodeDefinition
{

    const CODE_OF_QUERY_ACCOUNT = 'N01010'; // 帐务查询
    const CODE_OF_LIMITED_RECIPIENT_EDIT = 'N02010'; // 受限收方编辑
    const CODE_OF_INTERNAL_TRANSFER = 'N02020'; // 内部转帐
    const CODE_OF_PAY = 'N02030'; // 支付
    const CODE_OF_DIRECT_PAY = 'N02031'; // 直接支付
    const CODE_OF_GROUP_PAY = 'N02040'; // 集团支付
    const CODE_OF_DIRECT_GROUP_PAY = 'N02041'; // 直接集团支付
    const CODE_OF_WAGES_DISTRIBUTION = 'N03010'; // 代发工资
    const CODE_OF_DISTRIBUTION = 'N03020'; // 代发
    const CODE_OF_DEDUCTION = 'N03030'; // 代扣
    const CODE_OF_QUERY_CREDIT = 'N04010'; // 信用查询
    const CODE_OF_SELF_LOAN = 'N04020'; // 自助贷款
    const CODE_OF_DELEGATE_LOAN = 'N04030'; // 委托贷款
    const CODE_OF_BUSINESS_PAY = 'N02032'; // 商务支付业务
    const CODE_OF_LETTER_OF_CREDIT = 'N05010'; // 信用证
    const CODE_OF_BILL = 'N06010'; // 票据
    const CODE_OF_FIXED_CURRENT_SWITCH = 'N08010'; // 定活互转
    const CODE_OF_NOTICE_DEPOSIT = 'N08020'; // 通知存款
    const CODE_OF_GROUP_BALANCE_MANAGE = 'N15010'; // 集团资金余额管理
    const CODE_OF_GROUP_DELEGATE_LOAN_CASH_POOL = 'N15020'; // 集团委贷现金池
    const CODE_OF_DELEGATE_LIQUIDATION = 'N09010'; // 代理清算
    const CODE_OF_FOREIGN_TRANSFER = 'N07010'; // 外汇汇款
    const CODE_OF_LARGE_AMOUNT_CASH_TRANSFER = 'N15011'; // 资金余额管理大额划拨
    const CODE_OF_PBOC_EBILL_FIRM = 'N29010'; // 人行电子票据（企业）
    const CODE_OF_PBOC_EBILL_PEER = 'N29020'; // 人行电子票据（同业）

}