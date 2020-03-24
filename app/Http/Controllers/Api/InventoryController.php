<?php declare(strict_types=1);


namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBusInterface;
use Sakila\Domain\Inventory\Service\Request\AddInventoryRequest;
use Sakila\Domain\Inventory\Service\Request\RemoveInventoryRequest;
use Sakila\Domain\Inventory\Service\Request\ShowInventoriesRequest;
use Sakila\Domain\Inventory\Service\Request\ShowInventoryRequest;
use Sakila\Domain\Inventory\Service\Request\UpdateInventoryRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InventoryController extends AbstractController
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
     * @param int $inventoryId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $inventoryId): Response
    {
        $inventory = $this->commandBus->execute(new ShowInventoryRequest($inventoryId));

        return $this->response($inventory);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response
    {
        $page        = (int)$request->get('page', self::DEFAULT_PAGE);
        $pageSize    = (int)$request->get('page_size', self::DEFAULT_PAGE_SIZE);
        $inventories = $this->commandBus->execute(new ShowInventoriesRequest($page, $pageSize));

        return $this->response($inventories);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data      = json_decode((string)$request->getContent(), true);
        $inventory = $this->commandBus->execute(new AddInventoryRequest($data));

        return $this->response($inventory, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $inventoryId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $inventoryId, Request $request): Response
    {
        $data      = json_decode((string)$request->getContent(), true);
        $inventory = $this->commandBus->execute(new UpdateInventoryRequest($inventoryId, $data));

        return $this->response($inventory);
    }

    /**
     * @param int $inventoryId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $inventoryId): Response
    {
        $this->commandBus->execute(new RemoveInventoryRequest($inventoryId));

        return $this->response();
    }
}
