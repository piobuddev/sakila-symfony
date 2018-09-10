<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\Actor\Commands\AddActorCommand;
use Sakila\Domain\Actor\Commands\UpdateActorCommand;
use Sakila\Domain\Actor\Repository\ActorRepository;
use Sakila\Fractal\SimplePaginator;
use Sakila\Transformer\ActorTransformer;
use Sakila\Transformer\Transformer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ActorController extends AbstractController
{
    /**
     * @var \Sakila\Domain\Actor\Repository\ActorRepository
     */
    private $repository;

    /**
     * @param \Sakila\Domain\Actor\Repository\ActorRepository $repository
     * @param \Sakila\Transformer\Transformer                 $transformer
     */
    public function __construct(ActorRepository $repository, Transformer $transformer)
    {
        $this->repository = $repository;

        parent::__construct($transformer);
    }

    /**
     * @param int $actorId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $actorId): Response
    {
        $actor = $this->repository->get($actorId);

        return $this->response($this->item($actor, ActorTransformer::class));
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response
    {
        $page     = (int)$request->get('page', 1);
        $pageSize = (int)$request->get('page_size', 15);
        $items    = $this->repository->all($page, $pageSize);
        $total    = $this->repository->count();
        $actors   = new SimplePaginator($items, $page, $pageSize, $total);

        return $this->response($this->collection($actors, ActorTransformer::class));
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Sakila\Command\Bus\CommandBus            $commandBus
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request, CommandBus $commandBus): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $actor = $commandBus->execute(new AddActorCommand($data));

        return $this->response($this->item($actor, ActorTransformer::class), Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $actorId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @param \Sakila\Command\Bus\CommandBus            $commandBus
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $actorId, Request $request, CommandBus $commandBus): Response
    {
        $command = new UpdateActorCommand($actorId, json_decode((string)$request->getContent(), true));
        $actor   = $commandBus->execute($command);

        return $this->response($this->item($actor, ActorTransformer::class));
    }

    /**
     * @param int $actorId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $actorId): Response
    {
        $this->repository->remove($actorId);

        return $this->response();
    }
}
