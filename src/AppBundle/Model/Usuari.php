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
    public $poblacio;

    /**
     * @var string
     */
    public $poblacioSlug;


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
     * Gets the value of poblacio.
     *
     * @return string
     */
    public function getPoblacio()
    {
        return $this->poblacio;
    }

    /**
     * Sets the value of poblacio.
     *
     * @param string $poblacio the poblacio
     *
     * @return self
     */
    public function setPoblacio($poblacio)
    {
        $this->poblacio = $poblacio;

        return $this;
    }

    /**
     * Gets the value of poblacioSlug.
     *
     * @return string
     */
    public function getPoblacioSlug()
    {
        return $this->poblacioSlug;
    }

    /**
     * Sets the value of poblacioSlug.
     *
     * @param string $poblacioSlug the poblacio slug
     *
     * @return self
     */
    public function setPoblacioSlug($poblacioSlug)
    {
        $this->poblacioSlug = $poblacioSlug;

        return $this;
    }
}