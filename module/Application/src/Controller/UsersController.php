<?php
/**
 * Created by : Alexandre Ancellin
 * Date: 26/02/2017
 */

namespace Application\Controller;

use Application\Models\UsersModel;
use Zend\View\Model\JsonModel;
use Zend\View\Helper\ViewModel;

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
}