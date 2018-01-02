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
 * FormatterTest.
 */
final class FormatterTest extends TestCase
{
    
    /**
     * testInitialize().
     *
     * Test the random int function.
     *
     * @return void.
     */
    public function testInitialize()
    {
        $formatter = new Formatter();
        $this->assertTrue(is_array($formatter->initialize([
            'application' => [ 
            ],
        ])));
    }
  
    /**
     * testInitialize2().
     *
     * Test the random int function.
     *
     * @return void.
     */
    public function testInitialize2()
    {
        $formatter = new Formatter();
        $this->assertTrue(is_array($formatter->initialize([
            'application' => [
                'APP_SECRET_KEY' => '[GENIAL]@%$-<:Ns3Z-3^rUc>YdF$',
                'APP_NAME'       => 'Genial',
                'DEBUG'          => false,
                'LOG'            => true,
            ],
        ])));
    }
  
    /**
     * testInitialize3().
     *
     * Test the random int function.
     *
     * @return void.
     */
    public function testInitialize3()
    {
        $formatter = new Formatter();
        $this->assertTrue(is_array($formatter->initialize([
            'application' => [
                'APP_SECRET_KEY' => '[GENIAL]@%$-<:Ns3Z-3^rUc>YdF$',
                'APP_NAME'       => 'Genial',
                'DEBUG'          => false,
                'LOG'            => true,
            ],
            'test' => [
                'FOO' => 'null',
                'BAR' => 'true',
                'MEO' => 'false',
                'BAT' => '1',
                'FUN' => '0',
            ],
        ])));
    }
    
    /**
     * testInitialize4().
     *
     * Test the random int function.
     *
     * @return void.
     */
    public function testInitialize4()
    {
        $formatter = new Formatter();
        $this->assertTrue(is_array($formatter->initialize([
            'application' => [
                'APP_SECRET_KEY' => '[GENIAL]@%$-<:Ns3Z-3^rUc>YdF$',
                'APP_NAME'       => 'Genial',
                'DEBUG'          => false,
                'LOG'            => true,
            ],
            'test' => [
            ],
        ])));
    }
  
}
