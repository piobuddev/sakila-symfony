<?php declare(strict_types=1);

namespace Sakila\Command;

use League\Tactician\Handler\MethodNameInflector\MethodNameInflector;

/**
 * Handle command by calling the "execute" method.
 */
class ExecuteInflector implements MethodNameInflector
{
    /**
     * Return the method name to call on the command handler and return it.
     *
     * @param object $command
     * @param object $commandHandler
     *
     * @return string
     */
    public function inflect($command, $commandHandler)
    {
        return 'execute';
    }
}
