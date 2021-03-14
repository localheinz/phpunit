<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test\Result;

use PHPUnit\Event\Test\Result;

/**
 * @covers \PHPUnit\Event\Test\Result\Failure
 */
final class FailureTest extends AbstractResultTestCase
{
    protected function asString(): string
    {
        return 'failure';
    }

    protected function result(): Result
    {
        return new Failure();
    }
}
