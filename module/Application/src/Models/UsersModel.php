<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 26/02/2017
 */

namespace Application\Models;

use Application\Entity\User;
use Zend\Session\Container;

class UsersModel extends DefaultModel {

    public function __construct() {

        parent::__construct();

        $this->table = 'Users';

        $this->initialize();
    }

    public function getUserById($UsersId) {

        if (is_null($UsersId))
            return NULL;

        $select = $this->getDb()->select()
            ->from($this->table)
            ->where(['IdUsers' => $UsersId]);

        $statement = $this->getDb()->prepareStatementForSqlObject($select);

        $userData = $statement->execute()->current();

        $user = new User();

        if ($userData)
            $user->hydrate($userData);

        return $user;

    }

    public function getUsers() {
        return $this->select()->toArray();
    }

    public function checkIfEmailExist($email) {

        $select = $this->getDb()->select()
                                ->from($this->table)
                                ->where(['email' => $email]);

        $statement = $this->getDb()->prepareStatementForSqlObject($select);

        return $statement->execute()->count() > 0 ? true : false;
    }

    public function getUserByEmail($email) {

        $select = $this->getDb()->select()
                                ->from($this->table)
                                ->where(['email' => $email]);

        $statement = $this->getDb()->prepareStatementForSqlObject($select);

        return $statement->execute()->current();
    }

    public function login($email, $password) {

        $select = $this->getDb()->select()
                                ->from($this->table)
                                ->where(['email' => $email, 'password' => $password]);

        $statement = $this->getDb()->prepareStatementForSqlObject($select);

        $authentication = new Container('Authentication');
        $isConnected = false;

        $userData = $statement->execute()->current();

        if ($userData) {
            $isConnected = true;
            $user = new User();
            $user->hydrate($userData);
            $authentication->offsetSet('connectedUserId', $user->idUsers);
        }
        else {
            $authentication->offsetSet('connectedUserId', NULL);
        }

        $authentication->offsetSet('isConnected', $isConnected);
        return $isConnected;
    }

    public static function isConnected() {

        $authentication = new Container('Authentication');

        $isConnected = $authentication->offsetGet('isConnected');

        if (!isset($isConnected))
            $authentication->offsetSet('isConnected', false);

        return (bool) $authentication->offsetGet('isConnected');
    }

    public static function getConnectedUser() {

        $authentication = new Container('Authentication');

        $userConnected = $authentication->offsetGet('connectedUserId');

        if (!isset($userConnected))
            $authentication->offsetSet('connectedUserId', NULL);

        return array('connectedUserId' => $authentication->offsetGet('connectedUserId'));
    }

    public static function disconnect() {

        $authentication = new Container('Authentication');

        $authentication->offsetSet('connectedUserId', NULL);
        $authentication->offsetSet('isConnected', false);

    }

}