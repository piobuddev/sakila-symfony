<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Payment;

class PaymentTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\Payment $payment
     *
     * @return array
     */
    public function transform(Payment $payment): array
    {
        return [
            'paymentId'   => $payment->getPaymentId(),
            'customerId'  => $payment->getCustomerId(),
            'staffId'     => $payment->getStaffId(),
            'rentalId'    => $payment->getRentalId(),
            'amount'      => $payment->getAmount(),
            'paymentDate' => $payment->getPaymentDate(),
        ];
    }
}
