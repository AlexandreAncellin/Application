<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Forms\LoginForm;
use Application\Forms\RegisterForm;
use Application\Models\UsersModel;
use Application\Filters\LoginFilter;
use Zend\Session\Container;
use Zend\View\Model\JsonModel;
use Application\Filters\AuthenticationFilter;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;

class AuthenticationController extends DefaultController
{
    public function registerAction()
    {
        $flashMessenger = new FlashMessenger();

        $form = new RegisterForm();
        $userModel = new UsersModel();

        if ($this->getRequest()->isPost()) {

            $authenticationFilter = new AuthenticationFilter();
            $form->setInputFilter($authenticationFilter->getInputFilter());

            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {

                $data = $form->getData();

                if ($userModel->checkIfEmailExist($data['email'])) {
                    $flashMessenger->addMessage('You are now logged in.');
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
        $authentication = new Container('Authentication');

        if ($this->getRequest()->isPost()) {

            $loginFilter = new LoginFilter();
            $form->setInputFilter($loginFilter->getInputFilter());

            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {

                $data = $form->getData();

                $userModel = new UsersModel();
                $userModel->login($data['login'], $data['password']);

            }

            return new JsonModel(array('connectedUserId' => $authentication->offsetGet('connectedUserId'), 'isConnected' => $authentication->offsetGet('isConnected')));
        }

        $viewModel->setTerminal(true); // cache le layout
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }

    public function disconnectAction() {
        $userModel = new UsersModel();
        $userModel->disconnect();

        return $this->redirect()->toRoute('home');
    }

}
