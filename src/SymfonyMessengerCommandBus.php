<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerCommandBus;

use Oscmarb\Ddd\Domain\Command\Command;
use Oscmarb\Ddd\Domain\Command\CommandBus;
use Oscmarb\Ddd\Domain\Command\CommandHandler;
use Oscmarb\MessengerBus\SymfonyMessengerBus;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;

class SymfonyMessengerCommandBus extends SymfonyMessengerBus implements CommandBus
{
    /**
     * @param CommandHandler[] $handlers
     * @param MiddlewareInterface[] $middlewares
     */
    public function __construct(array $handlers, array $middlewares)
    {
        parent::__construct($handlers, $middlewares, true);
    }

    public function handle(Command $command): void
    {
        $this->dispatch($command);
    }

    public function handleMultiple(Command ...$commands): void
    {
        foreach ($commands as $command) {
            $this->dispatch($command);
        }
    }

    protected function noHandlerForMessageException(mixed $data): ?\Throwable
    {
        return new CommandNotRegisteredException($data::class);
    }
}