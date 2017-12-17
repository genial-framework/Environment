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
use Genial\Env\Exception\LengthException;
use Genial\Env\Exception\RuntimeException;
use Genial\Env\Exception\UnderflowException;
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
        $this->expectException(UnderflowException::class);
        Env::getConfig('muzzle');
    }

    public function test9()
    {
        $this->expectException(LengthException::class);
        Env::getConfig('\'*w[+,8H&F:LE}^F8s;2H{+S`VG$6\'sRWbQJRsZ%A>p%3+^hWFZ4egu;LHuZaZwet]<P~WSG3("m/\'9kS+`dcL=&acT2qRrEz:,C_}=$;+.a)bRj"^[4(7()*Vgg4^Ck.3j4F_yJzHV;g27n4XWL`[m^(A:%^@b(DMm29u/t!~4,&?F2\'E89>8Kv4!P-p?rBTnfP(LaTkmE"7Kf~\s)Na+BM#`3}ra,WSr:4]}/,sMCT*Am9:absD=v)m]8MQ.P!');
    }

    public function test10()
    {
        $this->assertTrue(! Env::clearConfig());
    }
}
