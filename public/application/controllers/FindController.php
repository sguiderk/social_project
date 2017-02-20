<?php

class FindController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       
	   $registre2 = new  Application_Model_UserMapper();
	
		
		
		
	    $this->view->entries = $registre2->find(2);
	   
	   
    }

	 public function findAction($id)
    {
        	   $registre2 = new  Application_Model_UserMapper();
	
		
		
		
	    $this->view->entries = $registre2->find($id);
    }
	
	
	
	


	

}

