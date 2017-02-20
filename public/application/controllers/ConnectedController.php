<?php

class ConnectedController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        if(!Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('dev/login/index');
        }
    }

    public function indexAction()
    {
        // action body
        $userInfo = Zend_Auth::getInstance()->getStorage()->read();
        
        $this->view->name = $userInfo->name;
        $this->view->email = $userInfo->email;
    }


}

