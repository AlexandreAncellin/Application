<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 26/02/2017
 */

namespace Application\Models;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Application\Entity\User;

class UsersModel extends DefaultModel {

    public function __construct() {

        parent::__construct();

        $this->table = 'Users';
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new User());

        $this->initialize();
    }

    public function getUsers() {
        return $this->select()->toArray();
    }

    /**
     * Retourne vrai si l'email existe, faux sinon
     * @param string $email
     * @return bool
     */
    public function checkIfEmailExist($email) {

        $select = $this->_db ->select()
                            ->from($this->table)
                            ->where(['email' => $email]);

        $statement = $this->_db->prepareStatementForSqlObject($select);

        return $statement->execute()->count() > 0 ? true : false;
    }



}