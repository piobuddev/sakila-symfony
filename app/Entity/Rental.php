<?php

namespace Sakila\Entity;

/**
 * Rental
 */
class Rental extends AbstractEntity
{
    /**
     * @var \DateTime
     */
    private $rentalDate;

    /**
     * @var \DateTime|null
     */
    private $returnDate;

    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $rentalId;

    /**
     * @var \Sakila\Entity\Customer
     */
    private $customer;

    /**
     * @var \Sakila\Entity\Inventory
     */
    private $inventory;

    /**
     * @var \Sakila\Entity\Staff
     */
    private $staff;


    /**
     * Set rentalDate.
     *
     * @param \DateTime $rentalDate
     *
     * @return Rental
     */
    public function setRentalDate($rentalDate)
    {
        $this->rentalDate = $rentalDate;

        return $this;
    }

    /**
     * Get rentalDate.
     *
     * @return \DateTime
     */
    public function getRentalDate()
    {
        return $this->rentalDate;
    }

    /**
     * Set returnDate.
     *
     * @param \DateTime|null $returnDate
     *
     * @return Rental
     */
    public function setReturnDate($returnDate = null)
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate.
     *
     * @return \DateTime|null
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Rental
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
     * Get rentalId.
     *
     * @return int
     */
    public function getRentalId()
    {
        return $this->rentalId;
    }

    /**
     * Set customer.
     *
     * @param \Sakila\Entity\Customer|null $customer
     *
     * @return Rental
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
     * Set inventory.
     *
     * @param \Sakila\Entity\Inventory|null $inventory
     *
     * @return Rental
     */
    public function setInventory(\Sakila\Entity\Inventory $inventory = null)
    {
        $this->inventory = $inventory;

        return $this;
    }

    /**
     * Get inventory.
     *
     * @return \Sakila\Entity\Inventory|null
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Set staff.
     *
     * @param \Sakila\Entity\Staff|null $staff
     *
     * @return Rental
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
}
