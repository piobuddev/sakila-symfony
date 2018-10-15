<?php

namespace Sakila\Entity;

/**
 * Staff
 */
class Staff extends AbstractEntity
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $picture;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var bool
     */
    private $active = '1';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string|null
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var bool
     */
    private $staffId;

    /**
     * @var \Sakila\Entity\Address
     */
    private $address;

    /**
     * @var \Sakila\Entity\Store
     */
    private $store;


    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return Staff
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return Staff
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set picture.
     *
     * @param string|null $picture
     *
     * @return Staff
     */
    public function setPicture($picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture.
     *
     * @return string|null
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Staff
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active.
     *
     * @param bool $active
     *
     * @return Staff
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return Staff
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return Staff
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Staff
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
     * Get staffId.
     *
     * @return bool
     */
    public function getStaffId()
    {
        return $this->staffId;
    }

    /**
     * Set address.
     *
     * @param \Sakila\Entity\Address|null $address
     *
     * @return Staff
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
     * Set store.
     *
     * @param \Sakila\Entity\Store|null $store
     *
     * @return Staff
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
