<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\Film\Service\Request\AddFilmRequest;
use Sakila\Domain\Film\Service\Request\RemoveFilmRequest;
use Sakila\Domain\Film\Service\Request\ShowFilmRequest;
use Sakila\Domain\Film\Service\Request\ShowFilmsRequest;
use Sakila\Domain\Film\Service\Request\UpdateFilmRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends AbstractController
{
    /**
     * @var \Sakila\Command\Bus\CommandBus
     */
    private $commandBus;

    /**
     * @param \Sakila\Command\Bus\CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param int $filmId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $filmId): Response
    {
        $film = $this->commandBus->execute(new ShowFilmRequest($filmId));

        return $this->response($film);
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
        $films    = $this->commandBus->execute(new ShowFilmsRequest($page, $pageSize));

        return $this->response($films);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $film = $this->commandBus->execute(new AddFilmRequest($data));

        return $this->response($film, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $filmId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $filmId, Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $film = $this->commandBus->execute(new UpdateFilmRequest($filmId, $data));

        return $this->response($film);
    }

    /**
     * @param int $filmId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $filmId): Response
    {
        $this->commandBus->execute(new RemoveFilmRequest($filmId));

        return $this->response();
    }
}
