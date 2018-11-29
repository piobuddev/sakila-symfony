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
     * @var int
     */
    private $customerId;

    /**
     * @var \Sakila\Entity\Inventory
     */
    private $inventory;

    /**
     * @var int
     */
    private $inventoryId;

    /**
     * @var \Sakila\Entity\Staff
     */
    private $staff;

    /**
     * @var int
     */
    private $staffId;


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

    public function getRentalDate(): string
    {
        return $this->rentalDate->format('Y-m-d H:i:s');
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

    public function getReturnDate():? string
    {
        return $this->returnDate ? $this->returnDate->format('Y-m-d H:i:s') : null;
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

    /**
     * @return int
     */
    public function getInventoryId(): int
    {
        return $this->inventoryId;
    }

    /**
     * @param int $inventoryId
     *
     * @return \Sakila\Entity\Rental
     */
    public function setInventoryId(int $inventoryId): Rental
    {
        $this->inventoryId = $inventoryId;

        return $this;
    }

    /**
     * @param int $customerId
     *
     * @return Rental
     */
    public function setCustomerId(int $customerId): Rental
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
     * @return Rental
     */
    public function setStaffId(int $staffId): Rental
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
}
