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

use Genial\Env\Exception\OverflowException;
use PHPUnit\Framework\TestCase;

/**
 * OverflowExceptionTest.
 */
final class OverflowExceptionTest extends TestCase
{
    /**
     * exceptionTest().
     *
     * @throws OverflowException
     *
     * @return void
     */
    public function exceptionTest()
    {
        $this->expectException(OverflowException::class);

        throw new OverflowException();
    }
}
