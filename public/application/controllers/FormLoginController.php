<?php

class FormLoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $db = $this->_getParam('db');

        $request = $this->getRequest();
        $loginForm =  new Application_Form_login();


        if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('index');
        }


        if ($loginForm->isValid($request->getPost())) {

            $adapter = new Zend_Auth_Adapter_DbTable(
                $db,
                'user',
                'name',
                'password'
            );


            $adapter->setIdentity($loginForm->getValue('username'));
            $adapter->setCredential($loginForm->getValue('password'));

            $auth   = Zend_Auth::getInstance();
            $result = $auth->authenticate($adapter);



            if ($result->isValid()) {


                $userInfo =  $adapter->getResultRowObject();

                # the default storage is a session with namespace Zend_Auth
                $authStorage = $auth->getStorage();
                $authStorage->write($userInfo);


                $this->_redirect('index');

                $this->_helper->FlashMessenger('Successful Login');


                return;
            }



        }else{
            echo 'Login ou mot de passe est incorrect';
        }

        $this->view->loginForm = $loginForm;
    }


}

