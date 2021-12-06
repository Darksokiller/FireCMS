<?php
namespace User\Model;

use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\InputFilter\InputFilter;
use Laminas\Filter\StripTags;
use Laminas\Filter\StringTrim;
use Laminas\Filter\ToInt;
use Laminas\Validator\StringLength;
use User\Filter\PasswordFilter;

class User implements InputFilterAwareInterface
{
    public $id;
    public $userName;
    public $email;
    public $password;
    public $role;
    public $regDate;
    public $active;
    public $verified;
    
    private $inputFilter;
    
    public function exchangeArray(array $data)
    {
        $this->id       = !empty($data ['id']) ? $data ['id'] : null;
        $this->userName = !empty($data ['userName']) ? $data ['userName'] : null;
        $this->email    = !empty($data ['email']) ? $data ['email'] : null;
        $this->password = !empty($data ['password']) ? $data ['password'] : null;
        $this->role     = !empty($data ['role']) ? $data ['role'] : null;
        $this->regDate  = !empty($data ['regData']) ? $data ['regData'] : null;
        $this->active   = !empty($data ['active']) ? $data ['active'] : null;
        $this->verified = !empty($data ['verified']) ? $data ['verified'] : null;
    }
    
    public function getArrayCopy()
    {
        return [
            'id'       => $this->id,
            'userName' => $this->userName,
            'email'    => $this->email,
            'password' => $this->password,
            'regData'  => $this->regDate,
            'active'   => $this->active,
            'verified' => $this->verified,
        ];
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
            ));
    }
    
    public function getLoginFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }
        
        $inputFilter = new InputFilter();
        
        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters'  => [
              ['name' => StripTags::class],
              ['name' => StringTrim::class],
            ],
            'validators' => [
               [
                   'name' => StringLength::class,
                   'options' => [
                     'encoding' => 'UTF-8',
                     'min' => 1,
                     'max' => 100,
                   ],
               ],
           ],
       ]); 
        
       $inputFilter->add([
           'name' => 'password',
           'required' => true,
           'filters' => [
               ['name' => StripTags::class],
               ['name' => StringTrim::class],
           ],
       ]);
       $this->inputFilter = $inputFilter;
       return $this->inputFilter;
       
    }
    
    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }
        
        $inputFilter = new InputFilter();
        
        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters'  => [
                ['name' => ToInt::class],
            ],
        ]);
        
        $inputFilter->add([
            'name' => 'userName',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        
        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
       ]);
       
       $inputFilter->add([
           'name' => 'password',
           'required' => true,
           'filters' => [
               ['name' => StripTags::class],
               ['name' => StringTrim::class],
               ['name' => PasswordFilter::class],
           ],
           'validators' => [
               [
                   'name' => StringLength::class,
                   'options' => [
                       'encoding' => 'UTF-8',
                       'min' => 1,
                       'max' => 100,
                   ],
               ],
           ],
       ]); 
        
       $this->inputFilter = $inputFilter;
       return  $this->inputFilter;
    }
    
    public function getPassword()
    {
        return $this->Password;
    }
}