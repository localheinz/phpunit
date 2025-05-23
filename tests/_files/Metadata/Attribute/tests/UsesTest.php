<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture\Metadata\Attribute;

use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\Attributes\UsesClassesThatExtendClass;
use PHPUnit\Framework\Attributes\UsesClassesThatImplementInterface;
use PHPUnit\Framework\Attributes\UsesFunction;
use PHPUnit\Framework\Attributes\UsesMethod;
use PHPUnit\Framework\Attributes\UsesNamespace;
use PHPUnit\Framework\Attributes\UsesTrait;
use PHPUnit\Framework\TestCase;

#[UsesNamespace('PHPUnit\TestFixture\Metadata\Attribute')]
#[UsesClass(Example::class)]
#[UsesClassesThatExtendClass(Example::class)]
#[UsesClassesThatImplementInterface(Example::class)]
#[UsesTrait(ExampleTrait::class)]
#[UsesMethod(Example::class, 'method')]
#[UsesFunction('f')]
final class UsesTest extends TestCase
{
    public function testOne(): void
    {
    }
}
