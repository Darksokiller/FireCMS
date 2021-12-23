<?php
namespace User\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Form\Element\Captcha;

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
           'name' => 'captcha',
           'type' => Element\Captcha::class,
           'options' => [
               'label' => 'Rewrite Captcha text:',
               'captcha' => new \Laminas\Captcha\Image([
                   'name' => 'myCaptcha',
                   'messages' => array(
                       'badCaptcha' => 'incorrectly rewitten image text'
                   ),
                   'wordLen' => 5,
                   'timeout' => 300,
                   'font' => $_SERVER['DOCUMENT_ROOT'] . 'fonts/arbli.ttf',
                   'imgDir' => $_SERVER['DOCUMENT_ROOT'] . '/modules/app/captcha/',
                   'imgUrl' => '/modules/app/captcha/',
                   'lineNoiseLevel' => 4,
                   'width' => 200,
                   'height' => 70
               ]),
           ]
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