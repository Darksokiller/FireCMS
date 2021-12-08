<?php
namespace User\Form;

use Laminas\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('user');
        
        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        
        $this->add([
            'name' => 'userName',
            'type' => 'text',
            'options' => [
                'label' => 'Username',
            ],
        ]);
        
        $this->add([
           'name' => 'email',
           'type' => 'text',
           'options' => [
               'label' => 'email',
           ], 
       ]);
       
       $this->add([
           'name' => 'password',
           'type' => 'password',
           'options' => [
               'label' => 'Password',
           ],
       ]); 
       
       $this->add([
           'name' => 'conf_password',
           'type' => 'password',
           'options' => [
               'label' => 'Confim Password',
           ],
       ]);
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'attributes' => [
               'value' => 'Go',
               'id'    => 'submitbutton'
           ],
       ]);
    }
}