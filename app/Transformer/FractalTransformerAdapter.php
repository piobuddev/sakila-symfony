<?php declare(strict_types=1);

namespace Sakila\Transformer;

use Illuminate\Pagination\LengthAwarePaginator;
use Laravel\Lumen\Application;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;
use Psr\Container\ContainerInterface;
use Sakila\Entity\EntityInterface;
use Sakila\Fractal\SimplePaginator;

class FractalTransformerAdapter implements Transformer
{
    /**
     * @var \League\Fractal\Manager
     */
    private $manager;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $application;

    /**
     * @param \League\Fractal\Manager           $manager
     * @param \Psr\Container\ContainerInterface $application
     */
    public function __construct(Manager $manager, ContainerInterface $application)
    {
        $manager->setSerializer(new ArraySerializer());

        $this->manager     = $manager;
        $this->application = $application;
    }

    /**
     * @param mixed       $data
     * @param string|null $transformer
     *
     * @return array
     */
    public function item($data, string $transformer = null): array
    {
        $item = new Item($data, $this->resolveTransformer($transformer));

        return $this->manager->createData($item)->toArray();
    }

    /**
     * @param mixed  $data
     * @param string $transformer
     *
     * @return array
     */
    public function collection($data, string $transformer = null): array
    {
        $collection = new Collection($data, $this->resolveTransformer($transformer));
        if ($data instanceof SimplePaginator) {
            $collection->setPaginator($data);
        }

        return $this->manager->createData($collection)->toArray();
    }

    /**
     * @param string|null $transformer
     *
     * @return \Closure|mixed
     */
    private function resolveTransformer(string $transformer = null)
    {
        if (null === $transformer) {
            return $this->getSimpleTransformer();
        }

        return $this->application->get($transformer);
    }

    /**
     * @return \Closure
     */
    private function getSimpleTransformer(): \Closure
    {
        return function (EntityInterface $entity) {
            return $entity->jsonSerialize();
        };
    }
}
