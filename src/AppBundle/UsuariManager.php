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
        $this->usuariEntity->setDescripcio($usuariYaml['descripcio']);
        $this->usuariEntity->setThumbnail($usuariYaml['imatge']);
    }

    public function getUsuari()
    {
        return $this->usuariEntity;
    }
}
