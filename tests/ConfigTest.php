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
 * ConfigTest.
 */
final class ConfigTest extends TestCase
{
    
    /**
     * testValidate().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testValidate()
    {
        $this->expectException(Exception\DomainException::class);
        Config::validate([
            'hello' => 'world'
        ], 1);
    }

    /**
     * testValidate2().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testValidate2()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        Config::validate([
            'test' => [
                'TEST' => 'config',
            ],
            'hello' => 'world'
        ], 1);
    }

    /**
     * testValidate3().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testValidate3()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        Config::validate([
            'test' => [
                'hello' => 'bar',
            ],
        ], 1);
    }
    
    /**
     * testValidate4().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testValidate4()
    {
        $this->expectException(Exception\DomainException::class);
        Config::validate([
            'test' => [
                'test' => [
                    'FOO' => 'bar',
                ],
            ],
        ], 1);
    }

    /**
     * testValidate5().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testValidate5()
    {
        $this->expectException(Exception\LengthException::class);
        Config::validate([
            'test' => [
                'WIUCHNUIWFCINQOWDIJNOIQJNWDOIJNCQIWNJDOICNJOIQWJNDCOIJNW' => 'foobar',
            ],
        ], 1);
    }

    /**
     * testValidate6().
     *
     * Test the validate function.
     *
     * @return void
     */
    public function testValidate6()
    {
        Env::clearConfig();
        $this->assertTrue(Config::validate([
            'test' => [
                'FOO' => 'bar',
            ],
        ], 1));
    }

    /**
     * __destruct().
     *
     * Clear the config
     *
     * @return void
     */
    public function __destruct()
    {
        Env::clearConfig();
    }
    
}
