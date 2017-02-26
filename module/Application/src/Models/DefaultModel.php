<?php
namespace Application\Models;

use Zend\Db\Adapter\Adapter;

class DefaultModel {

    private $_adapter;

    public function __construct()
    {
        $this->_adapter = new Adapter([
                                'driver'   => 'Pdo_Mysql',
                                'database' => 'Baggala',
                                'username' => 'root',
                                'password' => 'ALX2133SLD',
                            ]);
    }

    public function getAdapter() {
        return $this->_adapter;
    }


}