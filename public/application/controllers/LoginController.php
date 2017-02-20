<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loggedAction()
    {
     
    }

    public function logoutAction()
    {
        // action body

        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index'); // back to login page
    }

    public function isconnetedAction()
    {
        // action body
    }


}







