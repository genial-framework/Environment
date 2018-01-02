<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Env> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Env/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Env;

/**
 * Utils.
 */
class Utils
{
    
    /**
     * validConfigArray().
     *
     * Validate the configuration array.
     *
     * @param array|null                                 $config The config array.
     * @param int|Formatter::ENV_DONT_EXECUTE_SET_CONFIG $config Should the config class ececute the set config function.
     *
     * @throws UnderflowException If the array is empty.
     *
     * @return bool|true True if the configuration array is valid.
     */
    public static function validConfigArray(array $config = [], $execute = Formatter::ENV_DONT_EXECUTE_SET_CONFIG)
    {
        if (empty($config))
        {
            throw new Exception\UnderflowException(sprintf(
                '`%s` The `$config` array is empty.',
                __METHOD__
            ));
        }
        return Config::validate($config, $execute);
    }
    
}
