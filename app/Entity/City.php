<?php

namespace Sakila\Entity;

/**
 * City
 */
class City extends AbstractEntity
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $cityId;

    /**
     * @var \Sakila\Entity\Country
     */
    private $country;

    /**
     * @var int
     */
    private $countryId;


    /**
     * Set city.
     *
     * @param string $city
     *
     * @return City
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return City
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
     * Get cityId.
     *
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set country.
     *
     * @param \Sakila\Entity\Country|null $country
     *
     * @return City
     */
    public function setCountry(\Sakila\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return \Sakila\Entity\Country|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->countryId;
    }

    /**
     * @param int $countryId
     *
     * @return \Sakila\Entity\City
     */
    public function setCountryId(int $countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }
}
