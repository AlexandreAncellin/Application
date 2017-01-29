<?php

namespace Application\Models;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AuthenticationModel implements InputFilterAwareInterface
{
    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(array(
                'name'     => 'firstname',
                'required' => true
            ));

            $inputFilter->add(array(
                'name'     => 'lastname',
                'required' => true
            ));

            $inputFilter->add(array(
                'name'     => 'email',
                'required' => true
            ));

            $inputFilter->add(array(
                'name'     => 'password',
                'required' => true
            ));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}