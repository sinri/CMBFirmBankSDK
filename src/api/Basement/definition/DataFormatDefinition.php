<?php


namespace leqee\CMBFirmBankSDK\api\Basement\definition;


use sinri\ark\core\ArkHelper;

/**
 * Class DataFormatDefinition
 * @package leqee\CMBFirmBankSDK\api\Basement
 * @see <API DOC 5.37.0 附录 B.1>
 */
class DataFormatDefinition
{
    const DATA_FORMAT_C='C';
    const DATA_FORMAT_Z='Z';
    const DATA_FORMAT_S='S';
    const DATA_FORMAT_N='N';
    const DATA_FORMAT_D='D';
    const DATA_FORMAT_T='T';
    const DATA_FORMAT_DT='DT';
    const DATA_FORMAT_M='M';
    const DATA_FORMAT_I='I';
    const DATA_FORMAT_F='F';

    public static function verifyDataAgainstFormat($data,$format,$params=[]){
        switch ($format){
            case self::DATA_FORMAT_C:
                $length=ArkHelper::readTarget($params,[0],0);
                if(!preg_match('/^[a-zA-Z0-9]+$/',$data) || strlen($data)>$length){
                    return false;
                }
                break;
            case self::DATA_FORMAT_Z:
            case self::DATA_FORMAT_S:
                // TODO
                break;
            case self::DATA_FORMAT_N:
                if(!is_integer($data)){
                    return false;
                }
                break;
            case self::DATA_FORMAT_D:
                if(!preg_match('/^[012]\d\d\d[01]\d[0123]\d$/',$data)){
                    return false;
                }
                break;
            case self::DATA_FORMAT_T:
                if(!preg_match('/^[012]\d[0-5]\d[0-5]\d$/',$data)){
                    return false;
                }
                break;
            case self::DATA_FORMAT_DT:
                if(!preg_match('/^[012]\d\d\d[01]\d[0123]\d[012]\d[0-5]\d[0-5]\d$/',$data)){
                    return false;
                }
                break;
            case self::DATA_FORMAT_M:
                if(!preg_match('/^\d{1,13}\.\d{2}$/',$data)){
                    return false;
                }
                break;
            case self::DATA_FORMAT_I:
                if(!preg_match('/^\d{1,4}\.\d{7}$/',$data)){
                    return false;
                }
                break;
            case self::DATA_FORMAT_F:
                if(!preg_match('/^\d{1,'.$params[0].'}\.\d{'.$params[1].'}$/',$data)){
                    return false;
                }
                break;
            default:
                return false;
        }
        return true;
    }
}