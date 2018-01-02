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
     * @return string The formatted configuration array.
     */
    public function initialize(array $config = [])
    {
        if (Utils::validConfigArray($config, self::ENV_DONT_EXECUTE_SET_CONFIG))
        {
            $xconfig = [];
            if (isset($config['application']['APP_SECRET_KEY'])
                && !(strval($config['application']['APP_SECRET_KEY']) == 'null' || strlen(strval($config['application']['APP_SECRET_KEY'])) < 15))
            {
                $xconfig['application']['APP_SECRET_KEY'] = strval($config['application']['APP_SECRET_KEY']);
            } else
            {
                $xconfig['application']['APP_SECRET_KEY'] = $this->generateKey();
            }
            if (isset($config['application']['APP_NAME'])
                && !(strval($config['application']['APP_NAME']) == ''))
            {
                $xconfig['application']['APP_NAME'] = strval($config['application']['APP_NAME']);
            } else
            {
                $xconfig['application']['APP_NAME'] = 'Genial'; 
            }
            if (isset($config['application']['DEBUG'])
                && !(strval($config['application']['DEBUG']) == ''))
            {
                $xconfig['application']['DEBUG'] = (bool) $config['application']['DEBUG'];
            } else
            {
                $xconfig['application']['DEBUG'] = false;
            }
            if (isset($config['application']['LOG'])
                && !(strval($config['application']['LOG']) == ''))
            {
                $xconfig['application']['LOG'] = (bool) $config['application']['LOG'];
            } else
            {
                $xconfig['application']['LOG'] = false;   
            }
            unset($config['application']);
            foreach ($config as $section)
            {
                foreach ($section as $variable => $value)
                {
                    if ($value == 'null')
                    {
                        $config[$section][$variable] = null;
                    } elseif ($value == 'true')
                    {
                        $config[$section][$variable] = true;
                    } elseif ($value == 'false')
                    {
                        $config[$section][$variable] = false;
                    } elseif ($value == '1')
                    {
                        $config[$section][$variable] = true;
                    } elseif ($value == '0')
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
            $config['application'] = $xconfig;
            return $config;
        }
    }
        
}
