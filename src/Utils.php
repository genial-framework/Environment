<?php
namespace Genial\Env;
class Utils
{
    public static function validConfigArray(array $config = [])
    {
        if (empty($config))
        {
            throw new Exception\UnderflowException(sprintf(
                '`%s` The `$config` array is empty.',
                __METHOD__
            ));
        }
        return Config::validate($config);
    }
}
