<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 26/02/2017
 */

namespace Application\Models;

use Application\Models\BaggalaTableGateway;

class UsersModel extends DefaultModel
{
    private $_tableName = 'Users';

    public function getUsers() {

        $projectTable = new BaggalaTableGateway($this->_tableName, $this->getAdapter());
        return $projectTable->fetchAll();

    }

    public function getUserByEmail($email) {

        $projectTable = new BaggalaTableGateway($this->_tableName, $this->getAdapter());
        return $projectTable->select(array('Email' => $email))->toArray();
    }


}