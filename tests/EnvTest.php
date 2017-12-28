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
 * EnvTest.
 */
final class EnvTest extends TestCase
{
    
    /**
     * @var array $exampleConfig An example config used for testing
     */
    private $exampleConfig = [
        'app' => [
            'APP_NAME' => 'Genial',
        ],
        'randomSection' => [
            'HELLO' => 'world',
        ],
    ];

    /**
     * testGetConfig().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig()
    {
        $this->expectException(Exception\RuntimeException::class);
        Env::clearConfig();
        Env::getConfig('app');
    }

    /**
     * testGetConfig2().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig2()
    {
        $this->assertTrue(Env::setConfig($this->exampleConfig));
    }

    /**
     * testGetConfig3().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig3()
    {
        $this->assertEquals('Genial', Env::getConfig('app', 'app_name'));
    }

    /**
     * testSetConfig().
     *
     * Test the set config function.
     *
     * @return void
     */
    public function testSetConfig()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        Env::setConfig('fail');
    }

    /**
     * testGetConfig4().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig4()
    {
        $this->expectException(Exception\BadMethodCallException::class);
        Env::getConfig();
    }

    /**
     * testGetConfig5().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig5()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        Env::getConfig('');
    }

    /**
     * testGetConfig6().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig6()
    {
        $this->assertEquals(['APP_NAME' => 'Genial'], Env::getConfig('app'));
    }

    /**
     * testGetConfig7().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig7()
    {
        $this->assertEquals('world', Env::getConfig('randomSection', 'hello'));
    }

    /**
     * testGetConfig8().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig8()
    {
        $this->expectException(Exception\UnderflowException::class);
        Env::getConfig('muzzle');
    }

    /**
     * testGetConfig9().
     *
     * Test the get config function.
     *
     * @return void
     */
    public function testGetConfig9()
    {
        $this->expectException(Exception\LengthException::class);
        Env::getConfig('\'*w[+,8H&F:LE}^F8s;2H{+S`VG$6\'sRWbQJRsZ%A>p%3+^hWFZ4egu;LHuZaZwet]<P~WSG3("m/\'9kS+`dcL=&acT2qRrEz:,C_}=$;+.a)bRj"^[4(7()*Vgg4^Ck.3j4F_yJzHV;g27n4XWL`[m^(A:%^@b(DMm29u/t!~4,&?F2\'E89>8Kv4!P-p?rBTnfP(LaTkmE"7Kf~\s)Na+BM#`3}ra,WSr:4]}/,sMCT*Am9:absD=v)m]8MQ.P!');
    }

    /**
     * testClearConfig().
     *
     * Test the clear config function.
     *
     * @return void
     */
    public function testClearConfig()
    {
        $this->assertTrue(!Env::clearConfig());
    }
    
}
