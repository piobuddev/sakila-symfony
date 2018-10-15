<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\City\Service\Request\AddCityRequest;
use Sakila\Domain\City\Service\Request\RemoveCityRequest;
use Sakila\Domain\City\Service\Request\ShowCitiesRequest;
use Sakila\Domain\City\Service\Request\ShowCityRequest;
use Sakila\Domain\City\Service\Request\UpdateCityRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends AbstractController
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
     * @param int $cityId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $cityId): Response
    {
        $city = $this->commandBus->execute(new ShowCityRequest($cityId));

        return $this->response($city);
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
        $cities   = $this->commandBus->execute(new ShowCitiesRequest($page, $pageSize));

        return $this->response($cities);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $city = $this->commandBus->execute(new AddCityRequest($data));

        return $this->response($city, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $cityId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $cityId, Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $city = $this->commandBus->execute(new UpdateCityRequest($cityId, $data));

        return $this->response($city);
    }

    /**
     * @param int $cityId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $cityId): Response
    {
        $this->commandBus->execute(new RemoveCityRequest($cityId));

        return $this->response();
    }
}
