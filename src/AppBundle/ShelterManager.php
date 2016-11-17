<?php

namespace AppBundle;
use Symfony\Component\Yaml\Parser;
use AppBundle\Model\ShelterCollection;
use AppBundle\Model\Shelter;

class ShelterManager
{
    private $shelterCollection;

    public function __construct()
    {
        $yaml = new Parser();

        $sheltersArray = $yaml->parse(file_get_contents(__DIR__.'/Resources/Data/shelter.yml'))['shelters'];
        $shelters = array();
        foreach($sheltersArray as $shelterArray) {
            $shelter = new shelter();
            $shelter->name = $shelterArray['name'];
            $shelter->slug = $shelterArray['slug'];
            $shelter->image = $shelterArray['image'];
            $shelter->text = $shelterArray['text'];
            $shelters[] = $shelter;
        }
        $this->shelterCollection = new ShelterCollection($shelters);
    }

    public function findAll()
    {
        return $this->shelterCollection;
    }

    public function findOneBySlug($slug)
    {
        return $this->shelterCollection->findOneBySlug($slug);
    }
}
