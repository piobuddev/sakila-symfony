<?php

namespace Sakila\Entity;

/**
 * Store
 */
class Store extends AbstractEntity
{
    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var bool
     */
    private $storeId;

    /**
     * @var \Sakila\Entity\Address
     */
    private $address;

    /**
     * @var \Sakila\Entity\Staff
     */
    private $managerStaff;


    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Store
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
     * Get storeId.
     *
     * @return bool
     */
    public function getStoreId()
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
    public function setAddress(\Sakila\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return \Sakila\Entity\Address|null
     */
    public function getAddress()
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
    public function setManagerStaff(\Sakila\Entity\Staff $managerStaff = null)
    {
        $this->managerStaff = $managerStaff;

        return $this;
    }

    /**
     * Get managerStaff.
     *
     * @return \Sakila\Entity\Staff|null
     */
    public function getManagerStaff()
    {
        return $this->managerStaff;
    }
}
