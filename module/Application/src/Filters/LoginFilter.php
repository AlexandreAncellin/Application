<?php

namespace Application\Filters;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class LoginFilter implements InputFilterAwareInterface
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
                'name'     => 'login',
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