<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\TestSuite;

use PHPUnit\Event\AbstractEventTestCase;

/**
 * @covers \PHPUnit\Event\TestSuite\Loaded
 */
final class LoadedTest extends AbstractEventTestCase
{
    public function testConstructorSetsValues(): void
    {
        $telemetryInfo = self::createTelemetryInfo();

        $info = new Info(
            9001,
            'foo',
            [],
            [],
            [],
            'bar',
            [],
            []
        );

        $event = new Loaded(
            $telemetryInfo,
            $info
        );

        $this->assertSame($telemetryInfo, $event->telemetryInfo());
    }
}
