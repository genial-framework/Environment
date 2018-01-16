<?php
/**
 * @link      <https://github.com/SyzerPHP/Environment> for the canonical source repository.
 * @copyright Copyright (c) 2018, SyzerPHP <https://github.com/SyzerPHP>.
 * @license   <https://github.com/SyzerPHP/Environment/blob/master/LICENSE> New BSD License.
 */
namespace SyzerPHP\Environment;
use \PHPUnit\Framework\TestCase;
/**
 * ConfigTest.
 */
final class ConfigTest extends TestCase
{
    public function testValidate()
    {
        $this->expectException(Exception\DomainException::class);
        Config::validate([]); /* Pass empty array */
    }
    public function testValidate2()
    {
        $this->expectException(Exception\DomainException::class);
        Config::validate(['hello' => 'world']); /* Modify array depth */
    }
}
