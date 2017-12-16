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
use Genial\Env\Exception\RuntimeException;
use Genial\Env\Exception\BadMethodCallException;
use Genial\Env\Exception\InvalidArgumentException;
use Genial\Env\Exception\UnexpectedValueException;

/**
 * EnvTest.
 */
final class EnvTest extends TestCase
{
    private $exampleConfig = [
        'app' => [
            'APP_NAME' => 'Genial',
        ],
        'randomSection' => [
            'HELLO' => 'world',
        ],
    ];
    public function test()
    {
        $this->expectException(RuntimeException::class);
        Env::clearConfig();
        Env::getConfig('app');
    }

    public function test1()
    {
        $this->assertTrue(Env::setConfig($this->exampleConfig));
    }

    public function test2()
    {
        $this->assertEquals('Genial', Env::getConfig('app', 'app_name'));
    }

    public function test3()
    {
        $this->expectException(InvalidArgumentException::class);
        Env::setConfig('fail');
    }

    public function test4()
    {
        $this->expectException(BadMethodCallException::class);
        Env::getConfig();
    }

    public function test5()
    {
        $this->expectException(UnexpectedValueException::class);
        Env::getConfig('');
    }

    public function test6()
    {
        $this->assertEquals(['APP_NAME' => 'Genial'], Env::getConfig('app'));
    }

    public function test7()
    {
        $this->assertEquals('world', Env::getConfig('randomSection', 'hello'));
    }

    public function test8()
    {
        $this->assertTrue(! Env::clearConfig());
    }
}
