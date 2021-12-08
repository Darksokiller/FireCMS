<?php
namespace User\Form;

use Laminas\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Login');
        
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email'
            ]
       ]); 
        
       $this->add([
           'name' => 'password',
           'type' => 'password',
           'options' => [
               'label' => 'Password'
           ]
       ]);
       
       $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'attributes' => [
               'value' => 'Go',
               'id'    => 'submitbutton'
           ]
       ]);
    }
}