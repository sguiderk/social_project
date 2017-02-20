<?php

class NewsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body


        $usermapper = new  Application_Model_UserMapper();

        $result_user = $usermapper->fetchAll();

        $this -> view -> entries_user = $result_user ;



        $newsmapper = new  Application_Model_NewsMapper();

        $result_news = $newsmapper ->fetchAll();

        $this -> view -> entries_news = $result_news ;
    }

    public function addAction()
    {
        // action body

        $form = new Application_Form_Addnews();

        $request = $this->getRequest();


        if ($request->isPost()) {

            if ($form->isValid($request->getPost())) {

                $values = $form->getValues();

                $newsmapper = new  Application_Model_NewsMapper();

                $news = new Application_Model_News();


                $news->setTitle($values["title"]);

                $news->setContent($values["content"]);


                if(Zend_Auth::getInstance()->hasIdentity()){
                    $userInfo = Zend_Auth::getInstance()->getStorage()->read();

                    $news->setUserid($userInfo->id);

                }



                $this->view->entries = $newsmapper->save($news);


                echo 'Votre acutalité à etait ajouté';

                return $this->_helper->redirector('index');


            }

        }


        $this->view->form = $form;
    }

    public function deleteAction()
    {

        // action body

        $validate = $this->getRequest()->getParam('validate');

        $id = $this->getRequest()->getParam('news');

        $newsmapper = new  Application_Model_NewsMapper();

        $result = $newsmapper ->find($id);

        $this -> view -> entries = $result ;


        if($validate==true){

           $newsmapper = new  Application_Model_NewsMapper();

            $newsmapper->delete($id);

            $this->_redirect('news');

            echo 'Votre news à etait supprimé';
        }

    }

    public function findAction()
    {
        // action body

        $request = $this->getRequest();

        $id = $this->getRequest()->getParam('news');

        $newsmapper = new  Application_Model_NewsMapper();

        $result = $newsmapper  ->find($id);

        $commentmapper = new  Application_Model_CommentMapper();

        $this -> view -> entries = $result ;

        $result_comment=$commentmapper->fetchAll();

        $this -> view -> entries_comment = $result_comment;

        $form = new Zend_Form;

        $form->setAction('find')
            ->setMethod('post');

        $form->addElement(new Zend_Form_Element_Text('id'));
        // Passing a form element type to the form object:
        $form->addElement('text', 'id', array(
            'label' => 'id',
            'value' => $result[0]->id,
            'required' => true,
        ));

        $form->addElement(new Zend_Form_Element_Text('comment'));
        // Passing a form element type to the form object:
        $form->addElement('textarea', 'comment', array(
            'label' => 'comment',
            'size' => 20,
            'rows' => 5,
            'required' => true,
        ));


        $form->addElement('submit',"Ajouter");


        if ( $request->isPost() ) {

            if ($form->isValid($request->getPost())) {

                $values = $form->getValues();

                $comment = new Application_Model_Comment();

                $comment->setTitle($values["comment"]);

                $comment->setContent($values["comment"]);

                $comment->setNewsid($values["id"]);

                $commentmapper->save($comment);

  

                return $this->_helper->redirector('find', 'news', null, array('news' => $values["id"]));

                // Too decrypt the pasword pleas use this function   $decrypted = decryptIt( $values["password"] )

            }
        }




        $this -> view -> form = $form;




    }


}







