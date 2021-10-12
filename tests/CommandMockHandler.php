<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerCommandBus\Tests;

use Oscmarb\Ddd\Domain\Command\CommandHandler;

final class CommandMockHandler implements CommandHandler
{
    public function __invoke(CommandMock $command): void
    {
        throw new CommandException();
    }
}