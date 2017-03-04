<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 04/03/2017
 */

namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;

class DefaultController extends AbstractActionController
{
    private $flashMessenger;

    public function __construct()
    {
        $this->flashMessenger = new FlashMessenger();
    }

}