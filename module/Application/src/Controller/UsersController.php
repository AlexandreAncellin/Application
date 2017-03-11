<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 26/02/2017
 */

namespace Application\Controller;

use Application\Models\UsersModel;
use Zend\View\Model\JsonModel;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;

class UsersController extends DefaultController
{
    public function usersAction() {

        $userModel = new UsersModel();

        $params = $this->params()->fromRoute();

        if (isset($params['email'])) {
            $email = $this->email;
            return new JsonModel($userModel->getUserByEmail($email));
        } else {
            return new JsonModel($userModel->getUsers());
        }
    }

    public function addUserAction($user) {

    }

    public function deleteUserAction()
    {
        $userModel = new UsersModel();
        $event   = $this->getEvent();
        $matches = $event->getRouteMatch();
        $flashMessenger = new FlashMessenger();

        $success = array();

        if ($this->getRequest()->isDelete()) {
            $idUser = $matches->getParam('id');
            $success = $userModel->deleteUser($idUser);
        }

        if ($success) {
            $flashMessenger->addMessage('Utilisateur supprimé avec succès');
        } else {
            $flashMessenger->addMessage('Erreur lors de la suppression de l\'utilisateur');
        }

        return new JsonModel(array('idUser' => $idUser, 'deleted' => $success));
    }
}