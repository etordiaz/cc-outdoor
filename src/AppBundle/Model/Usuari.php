<?php

namespace AppBundle\Model;

class Usuari
{
    /**
     * @var string
     */
    public $nom;

    /**
     * @var string
     */
    public $descripcio;

    /**
     * @var string
     */
    public $thumbnail;


    public function __construct(){}

    /**
     * Gets the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Sets the value of nom.
     *
     * @param string $nom the nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Gets the value of descripcio.
     *
     * @return string
     */
    public function getDescripcio()
    {
        return $this->descripcio;
    }

    /**
     * Sets the value of descripcio.
     *
     * @param string $descripcio the descripcio
     *
     * @return self
     */
    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    /**
     * Gets the value of thumbnail.
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Sets the value of thumbnail.
     *
     * @param string $thumbnail the thumbnail
     *
     * @return self
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}