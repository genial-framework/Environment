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
 * Format.
 */
class Format implements FormatInterface
{
  
    /**
     * @var array $config The configuration array
     */
    protected static $config;  
  
    /**
     * __invoke().
     *
     * Set the configuration.
     *
     * @param array $xconfig The configuration array.
     *
     * @return bool|true If the configuration was set.
     */
    public function __invoke($xconfig)
    {
        self::$config = $this->create($xconfig);
        return true;
    }
  
}
