<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Notice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Notice\Model\Category;          
use Notice\Form\CategoryForm; 

class CategoryController extends AbstractActionController
{
    protected $categoryTable;
    
    public function indexAction() 
    {
        return new ViewModel(array(
            'categories' => $this->getCategoryTable()->fetchAll(),
        ));
    }
    
    public function addAction()
    {
        $form = new CategoryForm();
        $form->get('submit')->setValue('Add');
        //$form->get('submit')->setAttribute('value', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $cat = new Category();
            $form->setInputFilter($cat->getInputFilter());           
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $cat->exchangeArray($form->getData());
                $this->getCategoryTable()->saveCategory($cat);

                // Redirect to list of albums
                return $this->redirect()->toRoute('category');
            }
        }
        return array('form' => $form);        
    }
    
    public function editAction()
    {
         $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('category', array(
                'action' => 'add'
            ));
        }
        $cat = $this->getCategoryTable()->getCategory($id);

        $form  = new CategoryForm();
     
        $form->bind($cat);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($cat->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getCategoryTable()->saveCategory($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('category');
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
            return $this->redirect()->toRoute('category');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getCategoryTable()->deleteCategory($id);
            }

            // Redirect to list of categories
            return $this->redirect()->toRoute('category');
        }

        return array(
            'id'    => $id,
            'category' => $this->getCategoryTable()->getCategory($id)
        );
    }
    
    public function getCategoryTable()
    {
        if (!$this->categoryTable) {
            $sm = $this->getServiceLocator();
            $this->categoryTable = $sm->get('Notice\Model\CategoryTable');
        }
        return $this->categoryTable;
    }
}