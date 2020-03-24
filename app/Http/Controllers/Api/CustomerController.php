<?php declare(strict_types=1);


namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBusInterface;
use Sakila\Domain\Customer\Service\Request\AddCustomerRequest;
use Sakila\Domain\Customer\Service\Request\RemoveCustomerRequest;
use Sakila\Domain\Customer\Service\Request\ShowCustomerRequest;
use Sakila\Domain\Customer\Service\Request\ShowCustomersRequest;
use Sakila\Domain\Customer\Service\Request\UpdateCustomerRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractController
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
     * @param int $customerId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $customerId): Response
    {
        $customer = $this->commandBus->execute(new ShowCustomerRequest($customerId));

        return $this->response($customer);
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
        $customers = $this->commandBus->execute(new ShowCustomersRequest($page, $pageSize));

        return $this->response($customers);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data     = json_decode((string)$request->getContent(), true);
        $customer = $this->commandBus->execute(new AddCustomerRequest($data));

        return $this->response($customer, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $customerId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $customerId, Request $request): Response
    {
        $data     = json_decode((string)$request->getContent(), true);
        $customer = $this->commandBus->execute(new UpdateCustomerRequest($customerId, $data));

        return $this->response($customer);
    }

    /**
     * @param int $customerId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $customerId): Response
    {
        $this->commandBus->execute(new RemoveCustomerRequest($customerId));

        return $this->response();
    }
}
