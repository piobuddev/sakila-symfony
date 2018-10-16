<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\Store\Service\Request\AddStoreRequest;
use Sakila\Domain\Store\Service\Request\RemoveStoreRequest;
use Sakila\Domain\Store\Service\Request\ShowStoreRequest;
use Sakila\Domain\Store\Service\Request\ShowStoresRequest;
use Sakila\Domain\Store\Service\Request\UpdateStoreRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends AbstractController
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
     * @param int $storeId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $storeId): Response
    {
        $store = $this->commandBus->execute(new ShowStoreRequest($storeId));

        return $this->response($store);
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
        $stores   = $this->commandBus->execute(new ShowStoresRequest($page, $pageSize));

        return $this->response($stores);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $store = $this->commandBus->execute(new AddStoreRequest($data));

        return $this->response($store, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $storeId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $storeId, Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $store = $this->commandBus->execute(new UpdateStoreRequest($storeId, $data));

        return $this->response($store);
    }

    /**
     * @param int $storeId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $storeId): Response
    {
        $this->commandBus->execute(new RemoveStoreRequest($storeId));

        return $this->response();
    }
}
