<?php

declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Subscriber;

use PHPUnit\Event\Event;
use PHPUnit\Event\Run;
use PHPUnit\Event\Subscriber;
use PHPUnit\Event\Test;
use PHPUnit\Event\Types;
use PHPUnit\Event\UnexpectedEvent;
use PHPUnit\Runner\Version;
use PHPUnit\Util\Printer;

final class ConsolePrinter implements Subscriber
{
    private $printer;

    private $numberOfTests = 0;
    private $numberOfTestsRun = 0;

    public function __construct(Printer $printer)
    {
        $this->printer = $printer;
    }

    public function typesSubscribedTo(): Types
    {
        return new Types(
            new Run\BeforeRunType(),
            new Test\AfterTestType()
        );
    }

    public function notify(Event $event): void
    {
        $type = $event->type();

        if ($type->is(new Run\BeforeRunType())) {
            $this->printer->write(Version::getVersionString() . "\n");

            return;
        }

        if ($type->is(new Test\AfterTestType())) {
            $progress = '.';

            /** @var Test\AfterTest $event */
            $result = $event->result();

            if ($result->is(new Test\Result\Error())) {
                $progress = 'E';
            } elseif ($result->is(new Test\Result\Failure())) {
                $progress = 'F';
            } elseif ($result->is(new Test\Result\Incomplete())) {
                $progress = 'I';
            } elseif ($result->is(new Test\Result\Risky())) {
                $progress = 'R';
            } elseif ($result->is(new Test\Result\Skipped())) {
                $progress = 'S';
            } elseif ($result->is(new Test\Result\Warning())) {
                $progress = 'W';
            }

            $this->printer->write($progress);

            return;
        }

        throw UnexpectedEvent::for(
            self::class,
            $event->type()
        );
    }
}
