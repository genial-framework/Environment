<?php
/**
 * @link      <https://github.com/SyzerPHP/Environment> for the canonical source repository.
 * @copyright Copyright (c) 2018, SyzerPHP <https://github.com/SyzerPHP>.
 * @license   <https://github.com/SyzerPHP/Environment/blob/master/LICENSE> New BSD License.
 */
namespace SyzerPHP\Environment;
/**
 * Environment.
 */
class Environment
{
    /**
     * @var array|null $conf The config array.
     */
    protected static $conf = \null;
    /**
     * getConfig().
     *
     * Get a config section or section variable name.
     *
     * @param string $sec      The config section.
     * @param string|null $var The section variable name.
     *
     * @throws DomainException          If the `$sec` argument is empty.
     * @throws LengthException          If the `$sec`/`$var` argument is too long.
     * @throws RuntimeException         If there is no config array set.
     * @throws UnexpectedValueException If the section name is not in the config array.
     *
     * @return array Return the section array or section variable name.
     */
    public static function getConfig(string $sec, string $var = null): string
    {
        $sec = trim($sec);
        if (empty($sec) || $sec == '') {
            throw new Exception\DomainException('The `$sec` argument is empty.');
        }
        if (strlen($sec) > 30 || strlen($var) > 250) {
            throw new Exception\LengthException(\sprintf(
                'The `$sec` and/or `$var` argument is too long. Passed: `$sec` = `%s` `$var` = `%s`.',
                (string) strlen($sec),
                (string) strlen($var)
            ));
        }
        if (!self::$conf) {
            throw new Exception\RuntimeException('The `self::$conf` class variable is not set.');
        } else {
            $env = self::$conf;
        }
        if (isset($env[$sec])) {
            foreach ($env[$sec] as $var2 => $val) {
                if (!is_null($var) && $var2 == strtoupper($var)) {
                    return strval($val);
                }
            }
        } else {
            throw new Exception\UnexpectedValueException(\sprintf(
                'The section name is not in the config array. Passed: `%s`.',
                e($sec)
            ));
        }
        return $env[$sec];
    }
    /**
     * setConfig().
     *
     * Set the config array.
     *
     * @param array $conf The config array.
     *
     * @return void.
     */
    public static function setConfig(array $conf): void
    {
        Config::validate($conf);
    }
    /**
     * clearConfig().
     *
     * Clear the config array.
     *
     * @return void.
     */
    public static function clearConfig(): void
    {
        self::$conf = \null;
    }
}
