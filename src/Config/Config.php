<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Env> for the canonical source repository.
 *
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Env/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Env\Config;

use Genial\Env\Env;
use Genial\Env\Exception;

/**
 * Config.
 */
class Config extends Env
{
    /**
     * validate().
     *
     * Validate the configuration array.
     *
     * @param array $xconfig The configuration array.
     *
     * @throws DomainException          If $xconfig does have a depth of 2.
     * @throws UnexpectedValueException If the variable names are not capital letters.
     * @throws LengthException          If the variable name or value is too long.
     *
     * @return bool|true True if the configuration array is valid.
     */
    public static function validate(array $xconfig)
    {
        if (array_depth($xconfig) != 2) {
            throw new Exception\DomainException(sprintf(
                '`%s` The configuration array does not have a depth of 2.',
                __METHOD__
            ));
        }
        foreach ($xconfig as $array) {
            foreach ($array as $var => $val) {
                if (ctype_upper(str_replace('_', '', $var))) {
                    throw new Exception\UnexpectedValueException(sprintf(
                        '`%s` The configuration variable name must all be caps for it to work properly.',
                        __METHOD__
                    ));
                }
                if (strlen($var) > 30 || strlen($val) > 250) {
                    throw new Exception\LengthException(sprintf(
                        '`%s` The `$var` or `$val` variable is too long.',
                        __METHOD__
                    ));
                }
            }
        }
        self::$config = $xconfig;

        return true;
    }
}
