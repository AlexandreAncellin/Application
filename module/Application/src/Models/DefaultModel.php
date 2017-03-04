<?php
namespace Application\Models;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

class DefaultModel extends TableGateway {

    protected $_db;

    public function __construct()
    {
        $this->adapter = new Adapter([
                                'driver'   => 'Pdo_Mysql',
                                'database' => 'Baggala',
                                'username' => 'root',
                                'password' => 'ALX2133SLD',
                            ]);


        $this->_db = new Sql($this->adapter);
    }

}