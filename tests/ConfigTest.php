<?php
/**
 * Genial Framework.
 *
 * @author    Nicholas English <https://github.com/Nenglish7>
 * @author    Genial Contributors <https://github.com/orgs/Genial-Framework/people>
 *
 * @link      <https://github.com/Genial-Framework/Env> for the canonical source repository.
 *
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
    public function test()
    {
        $this->expectException(Exception\DomainException::class);
        Config\Config::validate(['hello' => 'world']);
    }

    public function test2()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        Config\Config::validate([
            'test' => [
                'test' => 'config',
            ],
        ]);
    }

    public function test3()
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

    public function test5()
    {
        $this->expectException(Exception\LengthException::class);
        Config\Config::validate([
            'test' => [
                'WIUCHNUIWFCINQOWDIJNOIQJNWDOIJNCQIWNJDOICNJOIQWJNDCOIJNW' => 'foobar',
            ],
        ]);
    }

    public function test6()
    {
        Env::clearConfig();
        $this->assertTrue(Config\Config::validate([
            'test' => [
                'FOO' => 'bar',
            ],
        ]));
    }

    function __destruct()
    {
        Env::clearConfig();
    }
}
