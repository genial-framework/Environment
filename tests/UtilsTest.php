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
 * EnvTest.
 */
final class UtilsTest extends TestCase
{
    public function test()
    {
        $this->expectException(Exception\UnderflowException::class);
        Utils::validConfigArray();
    }
   
    public function test2()
    {
        $this->expectException(Exception\UnderflowException::class);
        $this->assertTrue(Utils::validConfigArray([
            'test' => [
                'FOO' => 'bar'
            ]
        ]));
    }
    function __destruct()
    {
        Env::clearConfig();
    }
}
