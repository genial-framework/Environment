<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/).
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */

namespace Genial\Env\Tests;

use Genial\Env\Env as GenialEnv;
use PHPUnit\Framework\TestCase;

/**
 * EnvTest.
 */
final class EnvTest extends TestCase
{
    /* Example Configuration */
    private $config = [
        'session' => [
            'SESSION_NAME' => 'GenialTest',
        ],
    ];

    /**
     * getConfigTest().
     *
     * @return void
     */
    public function testGetConfig()
    {
        GenialEnv::setConfig($this->config);
        $this->assertEquals(
            'GenialTest',
            GenialEnv::getConfig('session', 'session_name')
        );
    }
}
