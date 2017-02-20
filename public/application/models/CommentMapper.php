<?php

class Application_Model_CommentMapper
{
    protected $_dbTable;


    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Comment');
        }
        return $this->_dbTable;
    }


    public function delete($id)
    {
        $comment = new Application_Model_Comment();
        $where = ('id ='.$id);
        $this->getDbTable()->delete($where);

    }

    public function fetchRow($id)
    {
        $comment = new Application_Model_Comment();
        $select = $comment->select()->where("id=?",$id);
        $data = $comment->fetchRow($select);
        return $data;
    }


    public function save(Application_Model_Comment $comment)
    {
        $data = array(
            'title'   => $comment->getTitle(),
            'content' => $comment->getContent(),
            'newsid' => $comment->getNewsid(),
            'date' => $comment->getDate(),
        );

        if (null === ($id = $comment->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id)
    {
        $resultSet = $this->getDbTable()->find($id);

        $entries_result = array();
        foreach ($resultSet as $row) {

            if($row->id==$id){
                $entry = new Application_Model_Comment();
                $entry->setId($row->id)
                    ->setTitle($row->title)
                    ->setContent($row->content)
                    ->setDate($row->date)
                    ->setNewsid($row->newsid);
                $entries_result[] = $entry;
            }

        }
        return $entries_result;

    }


    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Comment();
            $entry->setId($row->id)
                ->setTitle($row->title)
                ->setContent($row->content)
                ->setDate($row->date)
                ->setNewsid($row->newsid);
            $entries[] = $entry;
        }
        return $entries;
    }

}

