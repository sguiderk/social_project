<?php

class SaveController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
         

        $request = $this->getRequest();
        $form = new Application_Form_Registre();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
              

                 $this->view->comment = $form->getValues();
                

               $registre2 = new  Application_Model_UserMapper();
    
               $user = new Application_Model_User();
        

               $user->setName('dazda');

               $user->setCompany('dazda');
        
        
               $this->view->entries = $registre2->save($user);

                return $this->_helper->redirector('index');
            }
        }


         
    }


}

