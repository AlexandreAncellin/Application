<?php
namespace Application\Models;

use Zend\Db\TableGateway\TableGateway;

class BaggalaTableGateway extends TableGateway {

    public function fetchAll() {
       return $this->select()->toArray();
    }

    public function fetchRow() {
        return $this->select()->current();
    }

}