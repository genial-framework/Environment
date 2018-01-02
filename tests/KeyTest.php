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

use PHPUnit\Framework\TestCase;

/**
 * KeyTest.
 */
final class KeyTest extends TestCase
{
    
    /**
     * testGenerateRandomInt().
     *
     * Test the random int function.
     *
     * @return void.
     */
    public function testGenerateRandomInt()
    {
        $key = new Key();
        $this->assertTrue(strlen($key->generateRandomInt(10, 19)) === 2);
    }
  
    /**
     * testGenerateRandomInt2().
     *
     * Test the random int function.
     *
     * @return void.
     */
    public function testGenerateRandomInt2()
    {
        $key = new Key();
        $this->assertTrue(strlen($key->generateRandomInt(110, 119)) === 3);
    }
  
    /**
     * testGenerateRandomBool().
     *
     * Test the random bool function.
     *
     * @return void.
     */
    public function testGenerateRandomBool()
    {
        $key = new Key();
        $this->assertTrue(is_bool($key->generateRandomBool()));
    }
  
    /**
     * testGenerateRandomBytes().
     *
     * Test the random bytes function.
     *
     * @return void.
     */
    public function testGenerateRandomBytes()
    {
        $key = new Key();
        $this->assertTrue(is_string($key->generateRandomBytes()));
    }
  
    /**
     * testGenerateRandomString().
     *
     * Test the random bytes function.
     *
     * @return void.
     */
    public function testGenerateRandomString()
    {
        $key = new Key();
        $this->assertTrue(strlen($key->generateRandomString(20)) === 20);
    }
  
    /**
     * testGenerateKey().
     *
     * Test the key generation function.
     *
     * @return void.
     */
    public function testGenerateKey()
    {
        $key = new Key();
        $this->assertTrue(mb_substr($key->generateKey(), 0, 9) === '[GENIAL]@');
    }
  
    /**
     * testGenerateKey2().
     *
     * Test the key generation function.
     *
     * @return void.
     */
    public function testGenerateKey2()
    {
        $key = new Key();
        $this->assertTrue(mb_substr($key->generateKey(), 0, 9) === '[GENIAL]@');
    }
                          
    /**
     * testGenerateRandomString().
     *
     * Test the random bytes function.
     *
     * @return void.
     */
    public function testGenerateRandomString()
    {
        $this->expectException(Exception\LengthException::class);
        $key = new Key();
        $secretKey = $key->generateKey(252);
    }
    
}
