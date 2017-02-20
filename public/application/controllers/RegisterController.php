<?php

class RegisterController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Registre();

        $request = $this->getRequest();

        $form->attachment->setValueDisabled( true );

        if ( $request->isPost() ) {

            if ($form->isValid( $request->getPost() )) {

                $values = $form->getValues();

                $registre2 = new  Application_Model_UserMapper();

                $user = new Application_Model_User();


                $upload = new Zend_File_Transfer_Adapter_Http();
                $uploadDestination = APPLICATION_PATH . '/../public/img';

                if(!is_dir($uploadDestination)){
                    mkdir($uploadDestination, 0777, true);
                }

                $upload->setDestination($uploadDestination);

                if(!$upload->receive('attachment')) {
                    $messages = $upload->getMessages();
                }



                /** @var $mail Send mail on register */

                $mail = new Zend_Mail();
                $mail->setBodyText('Bien venue sur nore reseau social'.$values["login"]);
                $mail->setBodyHtml('Mon text en html');
                $mail->setFrom('social.dev@mail.com', 'Some Sender');
                $mail->addTo($values["email"], 'Some Recipient');
                $mail->setSubject('Inscription');
                $mail->send();
                

                $user->setName($values["login"]);

                $user->setPathimg($values["attachment"]);

                $user->setPassword( $values["password"] );
                // to encrypt  $encrypted = encryptIt();

                $user->setEmail($values["email"]);

                $this->view->entries = $registre2->save($user);


                echo 'Vous etes inscrit avec succées';


                // Too decrypt the pasword pleas use this function   $decrypted = decryptIt( $values["password"] )

            }
        }



        if(!Zend_Auth::getInstance()->hasIdentity()) {
            $this->view->form = $form;
        }

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


}



