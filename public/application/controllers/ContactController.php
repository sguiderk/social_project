<?php

class ContactController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

        $form = new Application_Form_Contact();

        $request = $this->getRequest();


        if ($request->isPost()) {

            if ($form->isValid($request->getPost())) {

                $values = $form->getValues();


                $mail = new Zend_Mail();
                $mail->setBodyText('Bien venue sur nore reseau social'.$values["name"]);
                $mail->setBodyHtml($values["message"]);
                $mail->setFrom($values["email"], 'Some Sender');
                $mail->addTo($values["email"], 'Some Recipient');
                $mail->setSubject('Inscription');
                $mail->send();

                echo 'message envoyer';
                


            }

        }


        $this->view->form = $form;


    }

    public function indexAction()
    {
        // action body
    }


}

