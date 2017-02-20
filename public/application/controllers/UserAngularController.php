<?php

class UserAngularController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function updateAction()
    {
        // action body

        $id = $this->getRequest()->getParam('id');

        $usermapper = new  Application_Model_UserMapper();

        $result = $usermapper  ->find($id);

        $this -> view -> entries = $result ;
    }


}



