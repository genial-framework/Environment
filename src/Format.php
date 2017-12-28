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

use Error;

/**
 * Format.
 */
class Format implements FormatInterface
{
  
    /**
     * __invoke().
     *
     * Set the configuration.
     *
     * @param mixed The value to format.
     *
     * @return string The formatted value.
     */
    public function __invoke($xvalue)
    {
        try
        {
            return floatval($xvalue);
        } catch (Error $e)
        {
            if ($xvalue == 'true' || $xvalue == 'false') 
            {
                return boolval($xvalue);
            }
            if ($xvalue == 'null')
            {
                return null;
            }
            return strval($xvalue);
        }
    }
  
}
