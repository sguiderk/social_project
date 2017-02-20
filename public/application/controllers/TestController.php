<?php

class TestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		echo 'cc';
    }
	
	 public function chatAction()
    {
        // action body
		
		$this->view->assign('msg','yopii jai reussi à passé un msg par paramétres coool aàc');
    }


}

