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
        Config\Config::validate([
            'hello' => 'world'
        ]);
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
        Config\Config::validate([
            'test' => [
                'TEST' => 'config',
            ],
            'hello' => 'world'
        ]);
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
        Config\Config::validate([
            'test' => [
                'hello' => 'bar',
            ],
        ]);
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
        Config\Config::validate([
            'test' => [
                'test' => [
                    'FOO' => 'bar',
                ],
            ],
        ]);
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
        Config\Config::validate([
            'test' => [
                'WIUCHNUIWFCINQOWDIJNOIQJNWDOIJNCQIWNJDOICNJOIQWJNDCOIJNW' => 'foobar',
            ],
        ]);
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
        $this->assertTrue(Config\Config::validate([
            'test' => [
                'FOO' => 'bar',
            ],
        ]));
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
