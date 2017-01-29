<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 29/01/2017
 */
namespace Application\Forms;
use Zend\Form\Element;
use Zend\Form\Form;

class Authentication extends Form
{
    public function __construct()
    {
        parent::__construct();

        $name = new Element('username');
        $name   ->setLabel('Nom de famille :')
                ->setAttributes(array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'id' => 'name'
                ));

        $button = new Element\Button('validate');
        $button ->setLabel('Valider');

        $this   ->add($name)
                ->add($button);
    }
}