<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 04/03/2017
 */

namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Zend\View\Model\JsonModel;

class DefaultController extends AbstractActionController
{
    public function getFlashMessagesAction() {

        $flashMessenger = new FlashMessenger();
        $messages = $flashMessenger->getMessages();

        return new JsonModel($messages);

    }
}