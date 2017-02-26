<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 05/02/2017
 */

namespace Application\Forms;

use Zend\Form\Element;
use Zend\Form\Form;

class LoginForm extends Form
{

    public function __construct()
    {
        parent::__construct();

        $login = new Element('login');
        $login
            ->setLabel('login (email)')
            ->setAttributes(array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'login'
            ));

        $password = new Element\Password('password');
        $password
            ->setLabel('Mot de passe')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' => 'password'
            ));

        $button = new Element\Button('validate');
        $button
            ->setLabel('Valider')
            ->setAttributes(array(
                'class' =>  'btn btn-primary',
                'id'    =>  'ValidLoginForm'

            ));

        $this->setAttribute('id', "loginForm");

        $this   ->add($login)
                ->add($password)
                ->add($button);
    }
}