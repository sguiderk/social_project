<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body


        $usermapper = new  Application_Model_UserMapper();

        $result = $usermapper->fetchAll();

        $this -> view -> entries = $result ;
        
    }

    public function findAction()
    {
        // action body

        $id = $this->getRequest()->getParam('user');

        $usermapper = new  Application_Model_UserMapper();

        $result = $usermapper  ->find($id);

        $this -> view -> entries = $result ;
    }

    public function updateAction()
    {
        // action body

        $id = $this->getRequest()->getParam('user');

        $usermapper = new  Application_Model_UserMapper();

        $result = $usermapper  ->find($id);

        $request = $this->getRequest();

        $form = new Zend_Form;

        $form->setAction('update')
            ->setMethod('post');

        $form->addElement(new Zend_Form_Element_Text('id'));
        // Passing a form element type to the form object:
        $form->addElement('text', 'id', array(
            'label' => 'id',
            'value' => $result[0]->id,
            'required' => true,
        ));

        $form->addElement(new Zend_Form_Element_Text('email'));
        // Passing a form element type to the form object:
        $form->addElement('text', 'email', array(
            'label' => 'Email',
            'value' => $result[0]->email,
            'required' => true,
        ));

        $form->addElement(new Zend_Form_Element_Text('login'));

        $form->addElement('text','login', array(
                'label' => 'Login',
                'value' => $result[0]->name,
            ));

        $form->addElement(new Zend_Form_Element_Text('password'));

        $form->addElement('password','password', array(
                'label' => 'Mot de pass',
                'value' => $result[0]->password,
            ));

        $element = new Zend_Form_Element_File('attachment');



        $element->setLabel('Upload an image:')
            ->setDestination(APPLICATION_PATH . '/../public/img')
            ->setRequired(false);
        $element->addValidator('Size', false, 102400);
        $form->addElement($element, 'attachment');

// The foo file element is optional but when it's given go into here
        if ($form->attachment->isUploaded()) {
            // foo file given... do something
        }


        $form->addElement('submit',"Modifier");


        if ( $request->isPost() ) {

            if ($form->isValid($request->getPost())) {

                $values = $form->getValues();

                $registre2 = new  Application_Model_UserMapper();

                $user = new Application_Model_User();


                $user->setId($values["id"]);

                $user->setName($values["login"]);

                $user->setPassword($values["password"]);

                $user->setPathimg($values["attachment"]);

                $user->setEmail($values["email"]);

                $this->view->entries = $registre2->save($user);


                echo 'Votre profil à etait modifier';

                return $this->_helper->redirector('index');


                // Too decrypt the pasword pleas use this function   $decrypted = decryptIt( $values["password"] )

            }
        }




        $this -> view -> form = $form;


    }


}





