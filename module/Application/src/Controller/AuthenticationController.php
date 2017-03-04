<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\User;
use Application\Forms\LoginForm;
use Application\Forms\RegisterForm;
use Application\Models\UsersModel;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Filters\LoginFilter;
use Zend\View\Model\JsonModel;
use Application\Filters\AuthenticationFilter;
use Zend\View\Model\ViewModel;

class AuthenticationController extends DefaultController
{
    public function registerAction()
    {
        $form = new RegisterForm();
        $userModel = new UsersModel();

        if ($this->getRequest()->isPost()) {

            $authenticationFilter = new AuthenticationFilter();
            $form->setInputFilter($authenticationFilter->getInputFilter());

            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {

                $data = $form->getData();

                if ($userModel->checkIfEmailExist($data['email'])) {
                    $this->flashMessenger()->addMessage('You are now logged in.');
                    return $this->redirect()->toRoute('user-success');
                }

                unset($data['validate']);



                $userModel = new UsersModel();
                $userModel->insert($data);
            }

        }
        return array('form' => $form);
    }

    public function loginAction()
    {
        $viewModel = new ViewModel();


        $form = new LoginForm();

        if ($this->getRequest()->isPost()) {

            $loginFilter = new LoginFilter();
            $form->setInputFilter($loginFilter->getInputFilter());

            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {

                $userModel = new UsersModel();
                $user = $userModel->getUserByEmail($_POST['login']);

                return new JsonModel($user);
            }
        }

        $viewModel->setTerminal(true);
        $viewModel->setVariable('form', $form);
        return $viewModel;

    }

}
