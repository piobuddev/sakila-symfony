<?php declare(strict_types=1);


namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBusInterface;
use Sakila\Domain\Payment\Service\Request\AddPaymentRequest;
use Sakila\Domain\Payment\Service\Request\RemovePaymentRequest;
use Sakila\Domain\Payment\Service\Request\ShowPaymentRequest;
use Sakila\Domain\Payment\Service\Request\ShowPaymentsRequest;
use Sakila\Domain\Payment\Service\Request\UpdatePaymentRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends AbstractController
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
     * @param int $paymentId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $paymentId): Response
    {
        $payment = $this->commandBus->execute(new ShowPaymentRequest($paymentId));

        return $this->response($payment);
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
        $payments = $this->commandBus->execute(new ShowPaymentsRequest($page, $pageSize));

        return $this->response($payments);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data    = json_decode((string)$request->getContent(), true);
        $payment = $this->commandBus->execute(new AddPaymentRequest($data));

        return $this->response($payment, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $paymentId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $paymentId, Request $request): Response
    {
        $data    = json_decode((string)$request->getContent(), true);
        $payment = $this->commandBus->execute(new UpdatePaymentRequest($paymentId, $data));

        return $this->response($payment);
    }

    /**
     * @param int $paymentId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $paymentId): Response
    {
        $this->commandBus->execute(new RemovePaymentRequest($paymentId));

        return $this->response();
    }
}
