<?php
namespace User\Form;

use Laminas\Form\Form;
use Laminas\Form\Fieldset;

use Laminas\Validator\Db\Validator\NoRecordExists;

class RegistrationForm extends Form
{
    
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('Registration');
        
        $fieldset = new Fieldset();
        
        $fieldset->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email'
            ]
        ]);
        
        $this->add($fieldset, ['name' => 'somefieldset']);
        
        //$this->add();
        
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
                'id' => 'submitbutton'
            ]
        ]);
    }
}