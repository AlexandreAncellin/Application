<?php
namespace Application\Models;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

class DefaultModel extends TableGateway {

    protected $_db;

    public function __construct()
    {
        if (!isset($this->adapter)) {
            $this->adapter = new Adapter([
                'driver' => 'Pdo_Mysql',
                'database' => 'Baggala',
                'username' => 'root',
                'password' => 'ALX2133SLD',
            ]);
        }
    }

    public function getDb() {

        if (!isset($this->_db)) {
            $this->_db = new Sql($this->adapter);
        }

        return $this->_db;

    }

}