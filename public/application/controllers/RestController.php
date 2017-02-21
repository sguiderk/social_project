<?php

class RestController extends Zend_Rest_Controller
{

    public function init()
    {
        /* Initialize action controller here */
        $bootstrap = $this->getInvokeArg('bootstrap');
        $options = $bootstrap->getOption('resources');

        $contextSwitch = $this->_helper->getHelper('contextSwitch');
        $contextSwitch  ->addActionContext('index', array('json'))
            ->addActionContext('get', array("json"))
            ->addActionContext('post', array("json"))
            ->addActionContext('put', array("json"))
            ->addActionContext('user', array("json"))
            ->addActionContext('updateuser', array("json"))
            ->addActionContext('delete', array("json"))
            ->initContext('json');



    }



    public function preDispatch(){
        $this->_helper->viewRenderer->setNoRender();
    }

    public function indexAction()
    {
        // action body
        $this->view->retour = "indexAction";
    }

    public function userAction()
    {
        // action body


        $table = new Zend_Db_Table ('user');
        $query = $table->select();

        $results = $table->getAdapter ()
            ->fetchAll ($query,Zend_Db::FETCH_GROUP);


        $this -> view -> entries = $results;
    }

    public function updateuserAction()
    {
        // action body


        $data = json_decode(file_get_contents("php://input"));

        $id =  $data->id;

        $name = $data->name;

        $email = $data->email;;

        $password = $data->password;;

        $registre2 = new  Application_Model_UserMapper();

        $user = new Application_Model_User();


        $user->setId($id);

        $user->setName($name);

        $user->setPassword($password);

        $user->setPathimg(" ");

        $user->setEmail($email);

        $registre2->save($user);


        $this -> view -> message = 'user has updated in success';



    }


   
    
    public function getAction()
    {
        // action body
        $this->view->retour = "getAction";
    }

    public function postAction()
    {
        // action body
        $this->view->retour = "postAction";
    }

    public function putAction()
    {
        // action body
        $this->view->retour = "putAction";
    }

    public function deleteAction()
    {
        // action body
        $this->view->retour = "deleteAction";
    }



}











