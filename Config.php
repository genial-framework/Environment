<?php
/**
 * @link      <https://github.com/SyzerPHP/Environment> for the canonical source repository.
 * @copyright Copyright (c) 2018, SyzerPHP <https://github.com/SyzerPHP>.
 * @license   <https://github.com/SyzerPHP/Environment/blob/master/LICENSE> New BSD License.
 */
namespace SyzerPHP\Environment;
/**
 * Config.
 */
class Config extends Environment
{
    /**
     * validate().
     *
     * Validate the config array.
     *
     * @param array $conf The config array.
     *
     * @throws DomainException          If `$conf` is empty.
     * @throws DomainException          If `$conf` does not have a depth of 2.
     * @throws UnexpectedValueException If a section is not the start of an array.
     * @throws UnexpectedValueException If the section variable names are not capital letters.
     * @throws LengthException          If the section variable name and/or value is too long.
     *
     * @return void.
     */
    public static function validate(array $conf)
    {
        if (\empty($conf)) {
            throw new Exception\DomainException('The config array is empty.');
        }
        if (\depth($conf) != 2) {
            throw new Exception\DomainException(\sprintf(
                'The config array does not have a depth of 2. Depth: `%s`.',
                (string) \depth($conf)
            ));
        }
        foreach ($conf as $var => $val) {
            if (!\is_array($val)) {
                throw new Exception\UnexpectedValueException(\sprintf(
                    'The section is not the start of an array. Passed: `%s`.',
                    \e($var)
                ));
            }
            foreach ($val as $var2 => $val2) {
                if (!\ctype_upper(\str_replace('_', '', $var2))) {
                    throw new Exception\UnexpectedValueException(\sprintf(
                        'The section variable name must all be caps. Passed: `%s`.',
                        \e($var2)
                    ));
                }
                if (\strlen($var2) > 30 || \strlen($val2) > 250) {
                    throw new Exception\LengthException(sprintf(
                        'The `$var2` and/or `$val2` variable is too long. Passed: `$var2` = `%s` `$val2` = `%s`.',
                        (string) \strlen($var2),
                        (string) \strlen($val2)
                    ));
                }
            }
        }
        self::clearConfig();
        self::$conf = $conf;
    }
}
