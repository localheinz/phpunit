<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use PHPUnit\Event\Event;
use PHPUnit\Event\Telemetry;
use SebastianBergmann\CodeUnit;

final class BeforeFirstTestMethodCalled implements Event
{
    private Telemetry\Info $telemetryInfo;

    /**
     * @psalm-var class-string
     */
    private string $testClassName;

    private CodeUnit\ClassMethodUnit $calledMethod;

    /**
     * @psalm-param class-string $testClassName
     * @psalm-param class-string $className
     */
    public function __construct(
        Telemetry\Info $telemetryInfo,
        string $testClassName,
        CodeUnit\ClassMethodUnit $calledMethod
    ) {
        $this->telemetryInfo = $telemetryInfo;
        $this->testClassName = $testClassName;
        $this->calledMethod  = $calledMethod;
    }

    public function telemetryInfo(): Telemetry\Info
    {
        return $this->telemetryInfo;
    }

    /**
     * @psalm-return class-string
     */
    public function testClassName(): string
    {
        return $this->testClassName;
    }

    public function calledMethod(): CodeUnit\ClassMethodUnit
    {
        return $this->calledMethod;
    }
}