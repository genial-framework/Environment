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
 * Key.
 */
class Key implements KeyInterface
{
    
    /**
     * @var string|[GENIAL]@ $prefix The key prefix.
     */
    private $prefix = '[GENIAL]@';
    
    /**
     * generateKey().
     *
     * Generate a secret key for Genial Framework
     *
     * @param int|20 $keyLength     The key length.
     * @param string|null $keyspace The characters that should be used in generation.
     *
     * @throws LengthException If the request variables are too long or too short.
     *
     * @return string The generated key.
     */
    public function generateKey($keyLength = 20, $keySpace = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=<>,.{}[]|\;:?/`~')
    {
        if ($keyLength < 15 || $keyLength > 250)
        {
            throw new Exception\LengthException(sprintf(
                '`%s` The `$keyLength` needs to be between `15` and `250`.',
                __METHOD__
            ));
        }
        return $this->prefix . $this->generateRandomString($keyLength, $keySpace);
    }
    
    /**
     * generateRandomString().
     *
     * Generate a random string
     *
     * @param int|20 $keyLength     The string length.
     * @param string|null $keyspace The characters that should be used in generation.
     *
     * @return string The generated key.
     */
    public function generateKey($stringLength = 20, $keySpace = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_-+=<>,.{}[]|\;:?/`~')
    {
        $string = '';
        $max = mb_strlen($keySpace, '8bit') - 1;
        for ($i = 0; $i < $stringLength; ++$i)
        {
            $string .= $keySpace[random_int(0, $max)];
        }
        return $string;
    }
     
}
