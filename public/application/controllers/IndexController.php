<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
    }

    function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "/* Zend_CodeGenerator_Php_File-ClassMarker: {IndexController} */");
    return( $qDecoded );

    }

    }

    public function indexAction()
    {
        // action body
		
  /*    if(Zend_Auth::getInstance()->hasIdentity()){

            $userInfo = Zend_Auth::getInstance()->getStorage()->read();

            $this->view->isconnected = true;

            $this->view->name = $userInfo->name;

            $this->view->email = $userInfo->email;
        }*/

	
    }

    public function saveAction()
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

    public function restAction()
    {
        // action body
    }


}





