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

        $firstName = new Element('firstname');
        $firstName
            ->setLabel('Prénom')
            ->setAttributes(array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'firstname'
            ));

        $lastName = new Element('lastname');
        $lastName
            ->setLabel('Nom')
            ->setAttributes(array(
                'type' => 'text',
                'class' => 'form-control',
                'id' => 'lastname'
            ));

        $email = new Element('email');
        $email
            ->setLabel('Email')
            ->setAttributes(array(
                'type' => 'email',
                'class' => 'form-control',
                'id' => 'email'
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
                'type'  =>  'submit'
            ));

        $this   ->add($firstName)
                ->add($lastName)
                ->add($email)
                ->add($password)
                ->add($button);
    }
}