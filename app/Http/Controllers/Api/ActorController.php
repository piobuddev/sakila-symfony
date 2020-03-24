<?php declare(strict_types=1);


namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBusInterface;
use Sakila\Domain\Actor\Service\Request\AddActorRequest;
use Sakila\Domain\Actor\Service\Request\RemoveActorRequest;
use Sakila\Domain\Actor\Service\Request\ShowActorRequest;
use Sakila\Domain\Actor\Service\Request\ShowActorsRequest;
use Sakila\Domain\Actor\Service\Request\UpdateActorRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ActorController extends AbstractController
{
    /**
     * @var \Sakila\Command\Bus\CommandBusInterface
     */
    private $commandBus;

    /**
     * @param \Sakila\Command\Bus\CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param int $actorId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $actorId): Response
    {
        $actor = $this->commandBus->execute(new ShowActorRequest($actorId));

        return $this->response($actor);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response
    {
        $page     = (int)$request->get('page', self::DEFAULT_PAGE);
        $pageSize = (int)$request->get('page_size', self::DEFAULT_PAGE_SIZE);
        $actors   = $this->commandBus->execute(new ShowActorsRequest($page, $pageSize));

        return $this->response($actors);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $actor = $this->commandBus->execute(new AddActorRequest($data));

        return $this->response($actor, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $actorId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $actorId, Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $actor = $this->commandBus->execute(new UpdateActorRequest($actorId, $data));

        return $this->response($actor);
    }

    /**
     * @param int $actorId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $actorId): Response
    {
        $this->commandBus->execute(new RemoveActorRequest($actorId));

        return $this->response();
    }
}
