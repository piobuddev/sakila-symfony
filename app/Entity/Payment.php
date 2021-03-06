<?php

namespace Sakila\Entity;

/**
 * Payment
 */
class Payment extends AbstractEntity
{
    /**
     * @var string
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $paymentDate;

    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $paymentId;

    /**
     * @var \Sakila\Entity\Customer
     */
    private $customer;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var \Sakila\Entity\Rental
     */
    private $rental;

    /**
     * @var int
     */
    private $rentalId;

    /**
     * @var \Sakila\Entity\Staff
     */
    private $staff;

    /**
     * @var int
     */
    private $staffId;


    /**
     * Set amount.
     *
     * @param string $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set paymentDate.
     *
     * @param \DateTime $paymentDate
     *
     * @return Payment
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getPaymentDate(): string
    {
        return $this->paymentDate->format('Y-m-d H:i:s');
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Payment
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate.
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Get paymentId.
     *
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set customer.
     *
     * @param \Sakila\Entity\Customer|null $customer
     *
     * @return Payment
     */
    public function setCustomer(\Sakila\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer.
     *
     * @return \Sakila\Entity\Customer|null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set rental.
     *
     * @param \Sakila\Entity\Rental|null $rental
     *
     * @return Payment
     */
    public function setRental(\Sakila\Entity\Rental $rental = null)
    {
        $this->rental = $rental;

        return $this;
    }

    /**
     * Get rental.
     *
     * @return \Sakila\Entity\Rental|null
     */
    public function getRental()
    {
        return $this->rental;
    }

    /**
     * Set staff.
     *
     * @param \Sakila\Entity\Staff|null $staff
     *
     * @return Payment
     */
    public function setStaff(\Sakila\Entity\Staff $staff = null)
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * Get staff.
     *
     * @return \Sakila\Entity\Staff|null
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param int $customerId
     *
     * @return Payment
     */
    public function setCustomerId(int $customerId): Payment
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $staffId
     *
     * @return Payment
     */
    public function setStaffId(int $staffId): Payment
    {
        $this->staffId = $staffId;

        return $this;
    }

    /**
     * @return int
     */
    public function getStaffId(): int
    {
        return $this->staffId;
    }

    /**
     * @param int $rentalId
     *
     * @return Payment
     */
    public function setRentalId(int $rentalId): Payment
    {
        $this->rentalId = $rentalId;

        return $this;
    }

    /**
     * @return int
     */
    public function getRentalId(): int
    {
        return $this->rentalId;
    }
}
