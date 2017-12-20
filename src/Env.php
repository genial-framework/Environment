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

namespace Genial\Env;

/**
 * Env.
 */
class Env
{
    /**
     * @var array|null The configuration array
     */
    protected static $config = null;

    /**
     * getConfig().
     *
     * Get the current configuration
     *
     * @param string|null $section  The configuration section to access
     * @param string|null $variable The configuration variable name to access
     *
     * @throws BadMethodCallException   If the $section argument is missing
     * @throws UnexpectedValueException If the $section argument is empty
     * @throws OverflowException        If the $section argument does not exist
     * @throws RuntimeException         If there is no configuration array set
     * @throws LengthException          If the request vriables are too long
     *
     * @return array Return the configuration array based on section and/or a variable value
     */
    public static function getConfig(string $section = null, string $variable = null)
    {
        if (is_null($section)) {
            throw new Exception\BadMethodCallException(sprintf(
                '`%s` The `$section` argument is missing.',
                __METHOD__
            ));
        }
        $section = trim($section);
        if (empty($section) || $section == '') {
            throw new Exception\UnexpectedValueException(sprintf(
                '`%s` The `$section` argument is empty.',
                __METHOD__
            ));
        }
        if (mb_strlen($section) > 30 || mb_strlen($variable) > 250) {
            throw new Exception\LengthException(sprintf(
                '`%s` The `$section` or `$variable` variable is too long.',
                __METHOD__
            ));
        }
        if (! self::$config) {
            throw new Exception\RuntimeException(sprintf(
                '`%s` the `self::$config` is not set.',
                __METHOD__
            ));
        } else {
            $env = self::$config;
        }
        if (isset($env[$section])) {
            foreach ($env[$section] as $nVariable => $value) {
                if (! is_null($variable) && $nVariable == strtoupper($variable)) {
                    return $value;
                }
                if (! $variable) {
                    goto doReturn;
                }
            }
        }
        throw new Exception\UnderflowException(sprintf(
            '`%s` The request section name is not in the configuration array.',
            __METHOD__
        ));
        doReturn:
        return $env[$section];
    }

    /**
     * setConfig().
     *
     * Set the current configuration
     *
     * @param array|[] $config The configuration array to use
     *
     * @throws InvalidArgumentException If $config is not an array
     *
     * @return bool|true if configuration array was set
     */
    public static function setConfig($config = [])
    {
        if (! is_array($config)) {
            throw new Exception\InvalidArgumentException(sprintf(
                '`%s` The `$config` variable has an invalid data type.',
                __METHOD__
            ));
        }

        return Utils::validConfigArray($config);
    }

    /**
     * clearConfig().
     *
     * Clear the current configuration
     *
     * @return void
     */
    public static function clearConfig()
    {
        self::$config = false;

        return false;
    }
}
