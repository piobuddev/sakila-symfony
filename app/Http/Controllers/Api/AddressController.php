<?php declare(strict_types=1);


namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBusInterface;
use Sakila\Domain\Address\Service\Request\AddAddressRequest;
use Sakila\Domain\Address\Service\Request\RemoveAddressRequest;
use Sakila\Domain\Address\Service\Request\ShowAddressesRequest;
use Sakila\Domain\Address\Service\Request\ShowAddressRequest;
use Sakila\Domain\Address\Service\Request\UpdateAddressRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends AbstractController
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
     * @param int $addressId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $addressId): Response
    {
        $address = $this->commandBus->execute(new ShowAddressRequest($addressId));

        return $this->response($address);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response
    {
        $page      = (int)$request->get('page', self::DEFAULT_PAGE);
        $pageSize  = (int)$request->get('page_size', self::DEFAULT_PAGE_SIZE);
        $addresses = $this->commandBus->execute(new ShowAddressesRequest($page, $pageSize));

        return $this->response($addresses);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data    = json_decode((string)$request->getContent(), true);
        $address = $this->commandBus->execute(new AddAddressRequest($data));

        return $this->response($address, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $addressId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $addressId, Request $request): Response
    {
        $data    = json_decode((string)$request->getContent(), true);
        $address = $this->commandBus->execute(new UpdateAddressRequest($addressId, $data));

        return $this->response($address);
    }

    /**
     * @param int $addressId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $addressId): Response
    {
        $this->commandBus->execute(new RemoveAddressRequest($addressId));

        return $this->response();
    }
}
