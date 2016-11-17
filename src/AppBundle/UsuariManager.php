<?php

namespace AppBundle;
use Symfony\Component\Yaml\Parser;
use AppBundle\Model\Usuari;

class UsuariManager
{
    private $usuariEntity;

    public function __construct()
    {
        $yaml = new Parser();
        $usuariYaml = $yaml->parse(file_get_contents(__DIR__.'/Resources/Data/usuari.yml'))['usuari'][0];

        $this->usuariEntity = new Usuari();
        $this->usuariEntity->setNom($usuariYaml['nom']);
        $this->usuariEntity->setPoblacio($usuariYaml['poblacio']);
        $this->usuariEntity->setPoblacioSlug($usuariYaml['poblacioSlug']);
    }

    public function getUsuari()
    {
        return $this->usuariEntity;
    }
}
