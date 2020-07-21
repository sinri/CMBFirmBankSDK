<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;


/**
 * Class InterestRateCodeDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement\definition
 * @see <API DOC 5.37.0 附录 A.35>
 * 利率类型码
 */
class InterestRateCodeDefinition
{

    const CODE_OF_NO_INTEREST = 'ZZZ'; // 不计息
    const CODE_OF_FIXED_NON_ROLLING = 'TD2'; // 定期不滚积数
    const CODE_OF_FIX_ROLLING = 'TD1'; // 定期滚积数
    const CODE_OF_MANUAL = 'D99'; // 手工计息
    const CODE_OF_CERTIFICATED_BOND = 'B01'; // 凭证式国债
    const CODE_OF_BOARD_FIRM_CURRENT_MARGIN_CLOSING = 'D12'; // 挂牌对公活期保证金关户结息
    const CODE_OF_BOARD_FIRM_CURRENT_MARGIN_QUARTERLY = 'D11'; // 挂牌对公活期保证金按季结息
    const CODE_OF_PROTOCOL = 'C01'; // 协议计息
    const CODE_OF_BOARD_OFFSHORE_PERSONAL_CURRENT_DEPOSIT = 'D32'; // 离岸挂牌个人活期存款
    const CODE_OF_BOARD_PEER_CURRENT_DEPOSIT = 'D03'; // 挂牌同业活期存款
    const CODE_OF_BOARD_ONSHORE_PERSONAL_CURRENT_DEPOSIT = 'D02'; // 在岸挂牌个人活期存款
    const CODE_OF_BOARD_OFFSHORE_FIRM_CURRENT_DEPOSIT = 'D31'; // 离岸挂牌对公活期存款
    const CODE_OF_BOARD_ONSHORE_FIRM_CURRENT_DEPOSIT = 'D01'; // 在岸挂牌对公活期存款
}