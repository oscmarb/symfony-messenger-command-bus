<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerCommandBus\Tests;

use Oscmarb\Ddd\Domain\Command\Command;

final class CommandMock extends Command
{
    public static function commandName(): string
    {
        return 'command_mock';
    }

    public static function fromPrimitives(mixed $body, string $messageId, string $messageOccurredOn): self
    {
        return new self($messageId, $messageOccurredOn);
    }

    public function toPrimitives(): array
    {
        return [];
    }
}