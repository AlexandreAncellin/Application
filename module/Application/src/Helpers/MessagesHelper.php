<?php

/**
 * Created by : Alexandre Ancellin
 * Date: 10/03/2017
 */
namespace Application\Helpers;

use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Zend\View\Helper\AbstractHelper;

class MessagesHelper extends AbstractHelper
{
    const SUCCESS = 1;
    const DANGER = 2;
    const INFO = 3;
    const WARNING = 4;


    public function __invoke($type = self::SUCCESS)
    {
        $flashMessenger = new FlashMessenger();
        $html = "";

        switch ($type) {
            case self::DANGER:
                $type = "danger";
                break;
            case self::SUCCESS:
                $type = "success";
                break;
            case self::WARNING:
                $type = "warning";
                break;
            case self::INFO:
                $type = "info";
                break;
            default:
                $type = "success";
                break;
        }

        if(!empty($flashMessenger->getMessages())) {

            $html .= "<div class='alert alert-$type' role='alert'>
                        <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>";

        foreach ($flashMessenger->getMessages() as $message) {
            $html .= " " . $message . " ";
        }

            $html .= "</div>";
        }

        return $html;
    }
}