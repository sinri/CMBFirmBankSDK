<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;

/**
 * Class ReturnCodeDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement
 * @see <API DOC 5.37.0 附录 A.2>
 */
class ReturnCodeDefinition
{
    const RETURN_CODE_SUCCESS = 0;
    const RETURN_CODE_CANNOT_SEND_TO_SERVER = -1;
    const RETURN_CODE_EXECUTE_FAILED = -2;
    const RETURN_CODE_DATA_FORMAT_ERROR = -3;
    const RETURN_CODE_NOT_LOGIN = -4;
    const RETURN_CODE_TOO_FREQUENT = -5;
    const RETURN_CODE_NOT_CERT_CARD_USER = -6;
    const RETURN_CODE_USER_CANCELLED = -7;
    const RETURN_CODE_OTHER = -9;
}