<?php
/**
 * @link      <https://github.com/SyzerPHP/Environment> for the canonical source repository.
 * @copyright Copyright (c) 2018, SyzerPHP <https://github.com/SyzerPHP>.
 * @license   <https://github.com/SyzerPHP/Environment/blob/master/LICENSE> New BSD License.
 */
namespace SyzerPHP\Environment;
use \PHPUnit\Framework\TestCase;
/**
 * EnvironmentTest.
 */
final class EnvironmentTest extends TestCase
{
    public function testSetConfig(): void
    {
        Environment::setConfig(
            [
                'application' => [
                                     'NAME' => 'SyzerPHP',
                                     'FOO' => 'BAR',
                                     'HELLO' => 'WORLD'
                                 ]
            ]
        );
        $this->assertTrue(Environment::getConfig('application', 'name') === 'SyzerPHP');
        $this->assertTrue(Environment::getConfig('application', 'hello') === 'WORLD');
        $this->assertTrue(Environment::getConfig('application', 'foo') === 'BAR');
    }
}
