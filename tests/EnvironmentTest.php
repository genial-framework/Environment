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
    public function testGenerateKey(): void
    {
        $this->assertTrue(\is_string(Key::generateKey()));
    }
}
