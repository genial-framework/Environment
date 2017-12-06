<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/).
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */

namespace Genial\Env;

use Genial\Env\Exception\BadMethodCallException;
use Genial\Env\Exception\InvalidArgumentException;
use Genial\Env\Exception\UnexpectedValueException;
use PHPUnit\Framework\TestCase;

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

    public function testSetConfig()
    {
        $this->assertTrue(Env::setConfig($this->exampleConfig));
    }

    public function testGetConfig()
    {
        $this->assertEquals('Genial', Env::getConfig('app', 'app_name'));
    }

    public function testSetConfigTwo()
    {
        $this->expectException(InvalidArgumentException::class);
        Env::setConfig('fail');
    }

    public function testGetConfigTwo()
    {
        $this->expectException(BadMethodCallException::class);
        Env::getConfig();
    }

    public function testGetConfigThree()
    {
        $this->expectException(UnexpectedValueException::class);
        Env::getConfig('');
    }

    public function testGetConfigFour()
    {
        $this->assertEquals(['APP_NAME' => 'Genial'], Env::getConfig('app'));
    }

    public function testGetConfigFive()
    {
        $this->assertEquals('world', Env::getConfig('randomSection', 'hello'));
    }
}
