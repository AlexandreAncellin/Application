<?php

/**
 * Created by : Alexandre Ancellin
 * Date: 03/03/2017
 */
namespace Application\Entity;

use Zend\Stdlib\ArrayObject;

class Entity extends ArrayObject
{

    public function hydrate($props) {

        if (is_null($props))
            return NULL;

        foreach ($props as $prop => $value) {
            $this->$prop = $value;
        }
    }
}