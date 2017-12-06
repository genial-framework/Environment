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
    ];

    public function testSetConfig()
    {
        $this->assertTrue(Env::setConfig($this->exampleConfig));
    }

    public function testGetConfig()
    {
        $this->assertEquals('Genial', Env::getConfig('app', 'app_name'));
    }
}
