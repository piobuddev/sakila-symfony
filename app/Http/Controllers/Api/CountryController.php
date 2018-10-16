<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\Country\Service\Request\AddCountryRequest;
use Sakila\Domain\Country\Service\Request\RemoveCountryRequest;
use Sakila\Domain\Country\Service\Request\ShowCountryRequest;
use Sakila\Domain\Country\Service\Request\ShowCountriesRequest;
use Sakila\Domain\Country\Service\Request\UpdateCountryRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends AbstractController
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
     * @param int $countryId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $countryId): Response
    {
        $country = $this->commandBus->execute(new ShowCountryRequest($countryId));

        return $this->response($country);
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
        $countries   = $this->commandBus->execute(new ShowCountriesRequest($page, $pageSize));

        return $this->response($countries);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $country = $this->commandBus->execute(new AddCountryRequest($data));

        return $this->response($country, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $countryId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $countryId, Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $country = $this->commandBus->execute(new UpdateCountryRequest($countryId, $data));

        return $this->response($country);
    }

    /**
     * @param int $countryId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $countryId): Response
    {
        $this->commandBus->execute(new RemoveCountryRequest($countryId));

        return $this->response();
    }
}
