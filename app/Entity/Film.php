<?php declare(strict_types=1);

namespace Sakila\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @var string|null
     */
    private $releaseYear;

    /**
     * @var int
     */
    private $rentalDuration = 3;

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
     * @var int
     */
    private $languageId;

    /**
     * @var \Sakila\Entity\Language
     */
    private $originalLanguage;

    /**
     * @var int
     */
    private $originalLanguageId;

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
        $this->actor    = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function setTitle(string $title): Film
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setDescription(string $description = null): Film
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription():? string
    {
        return $this->description;
    }

    public function setReleaseYear(?string $releaseYear = null): Film
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getReleaseYear(): int
    {
        return (int)$this->releaseYear;
    }

    public function setRentalDuration(int $rentalDuration): Film
    {
        $this->rentalDuration = $rentalDuration;

        return $this;
    }

    public function getRentalDuration(): int
    {
        return $this->rentalDuration;
    }

    public function setRentalRate(string $rentalRate): Film
    {
        $this->rentalRate = $rentalRate;

        return $this;
    }

    public function getRentalRate(): string
    {
        return $this->rentalRate;
    }

    public function setLength(?int $length = null): Film
    {
        $this->length = $length;

        return $this;
    }

    public function getLength():? int
    {
        return $this->length;
    }

    public function setReplacementCost(string $replacementCost): Film
    {
        $this->replacementCost = $replacementCost;

        return $this;
    }

    public function getReplacementCost(): string
    {
        return $this->replacementCost;
    }

    public function setRating(?string $rating = null): Film
    {
        $this->rating = $rating;

        return $this;
    }

    public function getRating():? string
    {
        return $this->rating;
    }

    public function setSpecialFeatures(?array $specialFeatures = null): Film
    {
        $this->specialFeatures = $specialFeatures;

        return $this;
    }

    public function getSpecialFeatures():? string
    {
        return $this->specialFeatures ? implode(',', $this->specialFeatures) : null;
    }

    public function setLastUpdate(\DateTime $lastUpdate): Film
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    public function getFilmId(): int
    {
        return $this->filmId;
    }

    public function setLanguage(Language $language = null): Film
    {
        $this->language = $language;

        return $this;
    }

    public function getLanguage():? Language
    {
        return $this->language;
    }

    public function setOriginalLanguage(Language $originalLanguage = null): Film
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getOriginalLanguage():? Language
    {
        return $this->originalLanguage;
    }

    public function addActor(Actor $actor): Film
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
    public function removeActor(Actor $actor): bool
    {
        return $this->actor->removeElement($actor);
    }

    /**
     * Get actor.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActor(): Collection
    {
        return $this->actor;
    }

    public function addCategory(Category $category): Film
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
    public function removeCategory(Category $category): bool
    {
        return $this->category->removeElement($category);
    }

    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function setLanguageId(int $languageId): Film
    {
        $this->languageId = $languageId;

        return $this;
    }

    public function getLanguageId(): int
    {
        return $this->languageId;
    }

    public function setOriginalLanguageId(int $originalLanguageId): Film
    {
        $this->originalLanguageId = $originalLanguageId;

        return $this;
    }

    public function getOriginalLanguageId():? int
    {
        return $this->originalLanguageId;
    }
}
