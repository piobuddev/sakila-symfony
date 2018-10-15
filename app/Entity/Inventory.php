<?php

namespace Sakila\Entity;

/**
 * Inventory
 */
class Inventory extends AbstractEntity
{
    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $inventoryId;

    /**
     * @var \Sakila\Entity\Film
     */
    private $film;

    /**
     * @var \Sakila\Entity\Store
     */
    private $store;


    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Inventory
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
     * Get inventoryId.
     *
     * @return int
     */
    public function getInventoryId()
    {
        return $this->inventoryId;
    }

    /**
     * Set film.
     *
     * @param \Sakila\Entity\Film|null $film
     *
     * @return Inventory
     */
    public function setFilm(\Sakila\Entity\Film $film = null)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film.
     *
     * @return \Sakila\Entity\Film|null
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set store.
     *
     * @param \Sakila\Entity\Store|null $store
     *
     * @return Inventory
     */
    public function setStore(\Sakila\Entity\Store $store = null)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store.
     *
     * @return \Sakila\Entity\Store|null
     */
    public function getStore()
    {
        return $this->store;
    }
}
