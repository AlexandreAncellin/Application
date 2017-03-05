<?php

/**
 * Created by : Alexandre Ancellin
 * Date: 03/03/2017
 */
namespace Application\Entity;

class User extends Entity
{
    public $firstname;
    public $lastname;
    public $password;
    public $email;
    public $idUsers;

    public function getFullName() {
        return $this->firstname. " " . $this->lastname;
    }
}