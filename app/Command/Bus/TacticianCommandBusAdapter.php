<?php declare(strict_types=1);

namespace Sakila\Command\Bus;

use League\Tactician\CommandBus as TacticianCommandBus;
use Sakila\Command\Command;

class TacticianCommandBusAdapter implements CommandBus
{
    /**
     * @var \League\Tactician\CommandBus
     */
    private $commandBus;

    /**
     * @param \League\Tactician\CommandBus $commandBus
     */
    public function __construct(TacticianCommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param \Sakila\Command\Command $command
     *
     * @return mixed
     */
    public function execute(Command $command)
    {
        return $this->commandBus->handle($command);
    }
}
