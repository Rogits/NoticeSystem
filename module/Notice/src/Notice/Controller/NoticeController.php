<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Notice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Notice\Model\Notice;          
use Notice\Form\NoticeForm; 

class NoticeController extends AbstractActionController
{
    protected $noticeTable;
    public function indexAction()
    {
        return new ViewModel(array(
            'notices' => $this->getNoticeTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new NoticeForm();
        $form->get('submit')->setValue('Add');
        //$form->get('submit')->setAttribute('value', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $notice = new Notice();
            $form->setInputFilter($notice->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $notice->exchangeArray($form->getData());
                $this->getNoticeTable()->saveNotice($notice);

                // Redirect to list of albums
                return $this->redirect()->toRoute('notice');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('notice', array(
                'action' => 'add'
            ));
        }
        $notice = $this->getNoticeTable()->getNotice($id);

        $form  = new NoticeForm();
        $form->bind($notice);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($notice->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getNoticeTable()->saveNotice($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('notice');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('notice');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getNoticeTable()->deleteNotice($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('notice');
        }

        return array(
            'id'    => $id,
            'notice' => $this->getNoticeTable()->getNotice($id)
        );
    }
    
    public function getNoticeTable()
    {
        if (!$this->noticeTable) {
            $sm = $this->getServiceLocator();
            $this->noticeTable = $sm->get('Notice\Model\NoticeTable');
        }
        return $this->noticeTable;
    }
    
}

?>