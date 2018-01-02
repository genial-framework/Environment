<?php
namespace Genial\Env;
class Env
{
    protected static $config = null;
    public static function getConfig(string $section = null, string $variable = null)
    {
        if (is_null($section))
        {
            throw new Exception\BadMethodCallException(sprintf(
                '`%s` The `$section` argument is missing.',
                __METHOD__
            ));
        }
        $section = trim($section);
        if (empty($section) || $section == '')
        {
            throw new Exception\UnexpectedValueException(sprintf(
                '`%s` The `$section` argument is empty.',
                __METHOD__
            ));
        }
        if (strlen($section) > 30 || strlen($variable) > 250)
        {
            throw new Exception\LengthException(sprintf(
                '`%s` The `$section` or `$variable` variable is too long.',
                __METHOD__
            ));
        }
        if (!self::$config)
        {
            throw new Exception\RuntimeException(sprintf(
                '`%s` the `self::$config` is not set.',
                __METHOD__
            ));
        } else
        {
            $env = self::$config;
        }
        if (isset($env[$section]))
        {
            foreach ($env[$section] as $nVariable => $value)
            {
                if (!is_null($variable) && $nVariable == strtoupper($variable))
                {
                    return strval($value);
                }
                if (!$variable || is_null($variable))
                {
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
    public static function setConfig($config = [])
    {
        if (!is_array($config))
        {
            throw new Exception\InvalidArgumentException(sprintf(
                '`%s` The `$config` variable has an invalid data type.',
                __METHOD__
            ));
        }
        return Utils::validConfigArray($config);
    }
    public static function clearConfig()
    {
        self::$config = false;
        return false;
    }
}
