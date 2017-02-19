<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Forms\LoginForm;
use Application\Forms\RegisterForm;
use Application\Models\AuthenticationModel;
use Zend\Mvc\Controller\AbstractActionController;


class AuthenticationController extends AbstractActionController
{
    public function registerAction()
    {

        $form = new RegisterForm();

        if ($this->getRequest()->isPost()) {

            $authenticationModel = new AuthenticationModel();
            $form->setInputFilter($authenticationModel->getInputFilter());

            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {

            }
        }
        return array('form' => $form);
    }

    public function loginAction()
    {
        $form = new LoginForm();

        if ($this->getRequest()->isPost()) {

            $authenticationModel = new AuthenticationModel();
            $form->setInputFilter($authenticationModel->getInputFilter());

            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {

            }
        }

        return array('form' => $form);
    }
}
