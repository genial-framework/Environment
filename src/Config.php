<?php
namespace Genial\Env;
class Config extends Env
{
    public static function validate(array $xconfig)
    {
        if (array_depth($xconfig) != 2)
        {
            throw new Exception\DomainException(sprintf(
                '`%s` The configuration array does not have a depth of 2.',
                __METHOD__
            ));
        }
        foreach ($xconfig as $array)
        {
            if (!is_array($array))
            {
                throw new Exception\UnexpectedValueException(sprintf(
                    '`%s` A section is not the start of an array.',
                    __METHOD__
                ));
            }
            foreach ($array as $var => $val)
            {
                if (!ctype_upper(str_replace('_', '', $var)))
                {
                    throw new Exception\UnexpectedValueException(sprintf(
                        '`%s` The configuration variable name must all be caps for it to work properly.',
                        __METHOD__
                    ));
                }
                if (strlen($var) > 30 || strlen($val) > 250)
                {
                    throw new Exception\LengthException(sprintf(
                        '`%s` The `$var` or `$val` variable is too long.',
                        __METHOD__
                    ));
                }
            }
        }
        self::clearConfig();
        self::$config = $xconfig;
        return true;
    }
}
