<?php

namespace AppBundle\Model;

class ShelterCollection
{
    /**
     * @var Shelter[]
     */
    public $shelters;

    /**
     * @param Shelter[]  $shelters
     * @param integer $offset
     * @param integer $limit
     */
    public function __construct($shelters = array(), $offset = null, $limit = null)
    {
        $this->shelters = $shelters;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function findOneBySlug($slug)
    {
        foreach ($this->shelters as $shelter) {
            if ($shelter->slug == $slug) {
                return $shelter;
            }
        }
        return null;
    }
}
