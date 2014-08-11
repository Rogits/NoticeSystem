<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Notice\Model;

use Zend\Db\TableGateway\TableGateway;

class NoticeTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getNotice($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveNotice(Notice $notice)
    {
        $data = array(            
            'description' => $notice->description,
            'title'  => $notice->title,
<<<<<<< HEAD
            'category' => $notice->category,
=======
            'category' => $notice->category
>>>>>>> 855d16ba3bef7234de700af923918d0f5747b98f
        );

        $id = (int)$notice->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getNotice($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteNotice($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}