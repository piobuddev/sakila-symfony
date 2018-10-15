<?php

namespace Sakila\Entity;

/**
 * Film
 */
class Film extends AbstractEntity
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var \DateTime|null
     */
    private $releaseYear;

    /**
     * @var bool
     */
    private $rentalDuration = '3';

    /**
     * @var string
     */
    private $rentalRate = '4.99';

    /**
     * @var int|null
     */
    private $length;

    /**
     * @var string
     */
    private $replacementCost = '19.99';

    /**
     * @var string|null
     */
    private $rating = 'G';

    /**
     * @var array|null
     */
    private $specialFeatures;

    /**
     * @var \DateTime
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     */
    private $filmId;

    /**
     * @var \Sakila\Entity\Language
     */
    private $language;

    /**
     * @var \Sakila\Entity\Language
     */
    private $originalLanguage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $actor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Film
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Film
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set releaseYear.
     *
     * @param \DateTime|null $releaseYear
     *
     * @return Film
     */
    public function setReleaseYear($releaseYear = null)
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    /**
     * Get releaseYear.
     *
     * @return \DateTime|null
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    /**
     * Set rentalDuration.
     *
     * @param bool $rentalDuration
     *
     * @return Film
     */
    public function setRentalDuration($rentalDuration)
    {
        $this->rentalDuration = $rentalDuration;

        return $this;
    }

    /**
     * Get rentalDuration.
     *
     * @return bool
     */
    public function getRentalDuration()
    {
        return $this->rentalDuration;
    }

    /**
     * Set rentalRate.
     *
     * @param string $rentalRate
     *
     * @return Film
     */
    public function setRentalRate($rentalRate)
    {
        $this->rentalRate = $rentalRate;

        return $this;
    }

    /**
     * Get rentalRate.
     *
     * @return string
     */
    public function getRentalRate()
    {
        return $this->rentalRate;
    }

    /**
     * Set length.
     *
     * @param int|null $length
     *
     * @return Film
     */
    public function setLength($length = null)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length.
     *
     * @return int|null
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set replacementCost.
     *
     * @param string $replacementCost
     *
     * @return Film
     */
    public function setReplacementCost($replacementCost)
    {
        $this->replacementCost = $replacementCost;

        return $this;
    }

    /**
     * Get replacementCost.
     *
     * @return string
     */
    public function getReplacementCost()
    {
        return $this->replacementCost;
    }

    /**
     * Set rating.
     *
     * @param string|null $rating
     *
     * @return Film
     */
    public function setRating($rating = null)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating.
     *
     * @return string|null
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set specialFeatures.
     *
     * @param array|null $specialFeatures
     *
     * @return Film
     */
    public function setSpecialFeatures($specialFeatures = null)
    {
        $this->specialFeatures = $specialFeatures;

        return $this;
    }

    /**
     * Get specialFeatures.
     *
     * @return array|null
     */
    public function getSpecialFeatures()
    {
        return $this->specialFeatures;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime $lastUpdate
     *
     * @return Film
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
     * Get filmId.
     *
     * @return int
     */
    public function getFilmId()
    {
        return $this->filmId;
    }

    /**
     * Set language.
     *
     * @param \Sakila\Entity\Language|null $language
     *
     * @return Film
     */
    public function setLanguage(\Sakila\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return \Sakila\Entity\Language|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set originalLanguage.
     *
     * @param \Sakila\Entity\Language|null $originalLanguage
     *
     * @return Film
     */
    public function setOriginalLanguage(\Sakila\Entity\Language $originalLanguage = null)
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    /**
     * Get originalLanguage.
     *
     * @return \Sakila\Entity\Language|null
     */
    public function getOriginalLanguage()
    {
        return $this->originalLanguage;
    }

    /**
     * Add actor.
     *
     * @param \Sakila\Entity\Actor $actor
     *
     * @return Film
     */
    public function addActor(\Sakila\Entity\Actor $actor)
    {
        $this->actor[] = $actor;

        return $this;
    }

    /**
     * Remove actor.
     *
     * @param \Sakila\Entity\Actor $actor
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeActor(\Sakila\Entity\Actor $actor)
    {
        return $this->actor->removeElement($actor);
    }

    /**
     * Get actor.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Add category.
     *
     * @param \Sakila\Entity\Category $category
     *
     * @return Film
     */
    public function addCategory(\Sakila\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category.
     *
     * @param \Sakila\Entity\Category $category
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategory(\Sakila\Entity\Category $category)
    {
        return $this->category->removeElement($category);
    }

    /**
     * Get category.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
}
