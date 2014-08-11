<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Notice\Form;

use Zend\Form\Form; 
use Notice\Model\CategoryTable;

class  NoticeForm extends Form
{
    protected $categoryTable;
        
    public function __construct(/*$name = null,*/ CategoryTable $categoryTable)
    {
        $this->categoryTable = $categoryTable;
        // we want to ignore the name passed
        parent::__construct('notice');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));                   
        
        $cats = array();
        //$i = 2;
        $table = $this->categoryTable->fetchAll()->toArray();
        foreach($table as $k => $v)
        {
            $cats[$v['name']] = $v['name'];
           //++$i;
        }
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',             
            'name' => 'category',      
            'options' => array(
                'label' => 'Category',
                'empty_option' => 'Choose a category',
                'value_options' => $cats,                                        
                /*array(
                    'Choral',
                    'Hard Rock',
                ),*/
                //'count' => 1,
                //'should_create_template' => true,    
                //'template_placeholder' => '__index__',
                //'allow_add' => true,
                //'target_element' => array(
                //    'type' => 'Notice\Form\CategoryFieldset'),                                
            ),                      
        ));
        $this->add(array(
            'name' => 'category',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Category',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'attributes' => array(
                'type'  => 'textarea',
            ),
            'options' => array(
                'label' => 'Description',
            ),
        ));
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Title',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));       
        
    }   
}


