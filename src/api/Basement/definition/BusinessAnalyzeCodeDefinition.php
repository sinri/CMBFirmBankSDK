<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;

/**
 * Class BusinessAnalyzeCodeDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement\definition
 * @see <API DOC 5.37.0 附录 A.8>
 * 交易分析码
 */
class BusinessAnalyzeCodeDefinition
{
    const CODE_OF_AN = 'AN'; // 成本信息管理系统
    const CODE_OF_AP = 'AP'; // 支付系统
    const CODE_OF_BR = 'BR'; // 缴交人民币存款准备金
    const CODE_OF_BS = 'BS'; // 国际业务进帐
    const CODE_OF_B1 = 'B1'; // 缴交外币存款一级准备金
    const CODE_OF_CK = 'CK'; // 票据交换（未打印）
    const CODE_OF_CO = 'CO'; // 通存通兑
    const CODE_OF_CS = 'CS'; // 现金
    const CODE_OF_DF = 'DF'; // 银行汇票
    const CODE_OF_DP = 'DP'; // 外汇资金拆借
    const CODE_OF_DS = 'DS'; // 变码印鉴扣费
    const CODE_OF_EF = 'EF'; // 国内结算业务收费
    const CODE_OF_FB = 'FB'; // 外币资金调拨
    const CODE_OF_FC = 'FC'; // 信贷融资扣费
    const CODE_OF_FE = 'FE'; // 缴费一户通
    const CODE_OF_FF = 'FF'; // 柜台缴费
    const CODE_OF_FS = 'FS'; // 缴费一户通（收费单位入帐）
    const CODE_OF_FT = 'FT'; // 外汇买卖
    const CODE_OF_GP = 'GP'; // 协议转账
    const CODE_OF_GS = 'GS'; // 国税
    const CODE_OF_HS = 'HS'; // 国际结算
    const CODE_OF_IN = 'IN'; // 411利息计提
    const CODE_OF_JT = 'JT'; // 外汇买卖
    const CODE_OF_LQ = 'LQ'; // 信用卡、银联清算
    const CODE_OF_MA = 'MA'; // 损益结转/信用卡
    const CODE_OF_NA = 'NA'; // 代理行
    const CODE_OF_NB = 'NB'; // 人民币资金运作
    const CODE_OF_NC = 'NC'; // 南昌国税
    const CODE_OF_NS = 'NS'; // 人民币资金运作
    const CODE_OF_NT = 'NT'; // 企业银行
    const CODE_OF_PK = 'PK'; // 票据交换（已打印）
    const CODE_OF_PX = 'PX'; // 欧元原币账户结转
    const CODE_OF_QI = 'QI'; // 季度结息进帐
    const CODE_OF_RB = 'RB'; // 计提呆帐准备金
    const CODE_OF_RC = 'RC'; // 储蓄异地清算
    const CODE_OF_RF = 'RF'; // 储蓄预提定期利息
    const CODE_OF_RH = 'RH'; // 储蓄异地总行清算
    const CODE_OF_RS = 'RS'; // 储蓄同城清算
    const CODE_OF_RT = 'RT'; // 深圳地区大额时时支付
    const CODE_OF_SI = 'SI'; // 清算系统－联行息收方自动解付
    const CODE_OF_SK = 'SK'; // 深交所资金结算
    const CODE_OF_SS = 'SS'; // 清算系统
    const CODE_OF_ST = 'ST'; // 同城411清算
    const CODE_OF_TL = 'TL'; // 电话银行扣费
    const CODE_OF_TX = 'TX'; // 地税
    const CODE_OF_VB = 'VB'; // 储蓄自动过账
    const CODE_OF_VM = 'VM'; // 两地通二次清算
    const CODE_OF_ZH = 'ZH'; // 母子公司协议上划下拨（资金余额管理、集团支付的母子公司交易）
}