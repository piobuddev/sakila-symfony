<?php

namespace Sakila\Entity;

/**
 * FilmText
 */
class FilmText extends AbstractEntity
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
     * @var int
     */
    private $filmId;


    /**
     * Set title.
     *
     * @param string $title
     *
     * @return FilmText
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
     * @return FilmText
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
     * Get filmId.
     *
     * @return int
     */
    public function getFilmId()
    {
        return $this->filmId;
    }
}
