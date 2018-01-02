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
 * Formatter.
 */
class Formatter extends Key
{
    
    /**
     * @const ENV_DONT_EXECUTE_SET_CONFIG Do not set the configuration array yet.
     */
    const ENV_DONT_EXECUTE_SET_CONFIG = 0;
    
    /**
     * initialize().
     *
     * Format the confiiguration array.
     *
     * @param array|[] $config The configuration array.
     *
     * @throws UnderflowException If there is an empty section.
     *
     * @return string Thee formatted configuration array.
     */
    public function initialize(array $config = [])
    {
        if (Utils::validConfigArray($config, self::ENV_DONT_EXECUTE_SET_CONFIG))
        {
            $xconfig = [];
            if (isset($config['application']['app_secret_key'])
                && !(strval($config['application']['app_secret_key']) == 'null' || strlen(strval($config['application']['app_secret_key'])) < 15))
            {
                $xconfig['application']['app_secret_key'] = strval($config['application']['app_secret_key']);
            } else
            {
                $xconfig['application']['app_secret_key'] = $this->generateKey();
            }
            if (isset($config['application']['app_name'])
                && !(strval($config['application']['app_name']) == ''))
            {
                $xconfig['application']['app_name'] = strval($config['application']['app_name']);
            } else
            {
                $xconfig['application']['app_name'] = 'Genial'; 
            }
            if (isset($config['application']['debug'])
                && !(strval($config['application']['debug']) == ''))
            {
                $xconfig['application']['debug'] = (bool) $config['application']['debug'];
            } else
            {
                $xconfig['application']['debug'] = false;
            }
            if (isset($config['application']['log'])
                && !(strval($config['application']['log']) == ''))
            {
                $xconfig['application']['log'] = (bool) $config['application']['log'];
            } else
            {
                $xconfig['application']['log'] = false;   
            }
            $config['application'] = $xconfig;
            foreach ($config as $section)
            {
                if ($section == 'application')
                {
                    continue;
                }
                foreach ($section as $variable => $value)
                {
                    if (is_null($value) || $value == 'null')
                    {
                        $config[$section][$variable] = null;
                    } elseif (strval($value) == 'true')
                    {
                        $config[$section][$variable] = true;
                    } elseif (strval($value) == 'false')
                    {
                        $config[$section][$variable] = false;
                    } elseif (strval($value) == '1')
                    {
                        $config[$section][$variable] = true;
                    } elseif (strval($value) == '0')
                    {
                        $config[$section][$variable] = false;
                    } else
                    {
                    }
                }
                if (empty($section))
                {
                    throw new Exception\UnderflowException(sprintf(
                        '`%s` There is an empty section.',
                        __METHOD__
                    ));
                }
            }
            return $config;
        }
    }
        
}
