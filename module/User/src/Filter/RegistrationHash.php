<?php
namespace User\Filter;

class RegistrationHash
{
    private $email;
    private $timestamp;
    protected $hash;
    
    public function __construct($email, $timestamp)
    {
        $string = $this->format($email, $timestamp);
        $this->setHash($this->filter($string));
    }
    private function format($email, $timestamp)
    {
        return $email . $timestamp;
    }
    private function setHash($hash)
    {
        $this->hash = $hash;
    }
    public function getHash()
    {
        if(isset($this->hash))
        {
            return $this->hash;
        }
    }
    public function filter($value)
    {
        if (!is_string($value)) {
            // eventually do some stuff here
        }
        
        return  password_hash($value, PASSWORD_DEFAULT);
    }
}