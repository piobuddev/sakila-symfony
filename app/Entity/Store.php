<?php declare(strict_types=1);

namespace Sakila\Entity;

use DateTime;

class Store extends AbstractEntity
{
    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $storeId;

    /**
     * @var \Sakila\Entity\Address
     */
    private $address;

    /**
     * @var int
     */
    private $addressId;

    /**
     * @var \Sakila\Entity\Staff
     */
    private $managerStaff;

    /**
     * @var int
     */
    private $managerStaffId;


    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Store
     */
    public function setLastUpdate($lastUpdate): Store
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate.
     *
     * @return \DateTime
     */
    public function getLastUpdate(): DateTime
    {
        return $this->lastUpdate;
    }

    /**
     * Get storeId.
     *
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->storeId;
    }

    /**
     * Set address.
     *
     * @param \Sakila\Entity\Address|null $address
     *
     * @return Store
     */
    public function setAddress(Address $address = null): Store
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return \Sakila\Entity\Address|null
     */
    public function getAddress(): ? Address
    {
        return $this->address;
    }

    /**
     * Set managerStaff.
     *
     * @param \Sakila\Entity\Staff|null $managerStaff
     *
     * @return Store
     */
    public function setManagerStaff(Staff $managerStaff = null): Store
    {
        $this->managerStaff = $managerStaff;

        return $this;
    }

    /**
     * Get managerStaff.
     *
     * @return \Sakila\Entity\Staff|null
     */
    public function getManagerStaff(): ? Staff
    {
        return $this->managerStaff;
    }

    /**
     * @return int
     */
    public function getManagerStaffId(): int
    {
        return $this->managerStaffId;
    }

    /**
     * @param int $managerStaffId
     *
     * @return \Sakila\Entity\Store
     */
    public function setManagerStaffId(int $managerStaffId): Store
    {
        $this->managerStaffId = $managerStaffId;

        return $this;
    }

    /**
     * @param int $addressId
     *
     * @return Store
     */
    public function setAddressId(int $addressId): Store
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->addressId;
    }
}
