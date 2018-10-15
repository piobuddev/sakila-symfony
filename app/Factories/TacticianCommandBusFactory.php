<?php declare(strict_types=1);

namespace Sakila\Factories;

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\CallableLocator;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use Sakila\Command\ExecuteInflector;

class TacticianCommandBusFactory
{
    /**
     * @param \Psr\Container\ContainerInterface $c
     *
     * @return \League\Tactician\CommandBus
     */
    public static function create(ContainerInterface $c): CommandBus
    {
        $inflector     = new ExecuteInflector();
        $nameExtractor = new ClassNameExtractor();
        $locator       = new CallableLocator(
            function ($command) use ($c) {
                $handlerClassName = self::resolveHandler($command);
                $handler          = $c->get($handlerClassName);

                return $handler;
            }
        );

        $commandHandlerMiddleware = new CommandHandlerMiddleware($nameExtractor, $locator, $inflector);

        return new CommandBus([$commandHandlerMiddleware]);
    }

    /**
     * @param string $command
     *
     * @return string
     */
    private static function resolveHandler(string $command): string
    {
        $reflection       = new ReflectionClass($command);
        $handlerNamespace = str_replace('Request', '', $reflection->getNamespaceName());
        $chunks           = (array)preg_split(
            '/(?=[A-Z])/',
            str_replace('Request', '', $reflection->getShortName())
        );

        array_shift($chunks);

        return $handlerNamespace . implode($chunks) . 'Service';
    }
}
