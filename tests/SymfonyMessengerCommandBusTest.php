<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerCommandBus\Tests;

use Oscmarb\SymfonyMessengerCommandBus\CommandNotRegisteredException;
use Oscmarb\SymfonyMessengerCommandBus\SymfonyMessengerCommandBus;
use PHPUnit\Framework\TestCase;

final class SymfonyMessengerCommandBusTest extends TestCase
{
    public function test_should_handle_command(): void
    {
        $this->expectException(CommandException::class);

        $bus = new SymfonyMessengerCommandBus([new CommandMockHandler()], []);
        $bus->handle(new CommandMock());
    }

    public function test_try_handle_command_without_handler(): void
    {
        $this->expectException(CommandNotRegisteredException::class);

        $bus = new SymfonyMessengerCommandBus([], []);
        $bus->handle(new CommandMock());
    }
}