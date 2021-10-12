<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerCommandBus;

final class CommandNotRegisteredException extends \RuntimeException
{
    public function __construct(private string $commandClass)
    {
        parent::__construct();
    }

    public function commandClass(): string
    {
        return $this->commandClass;
    }
}