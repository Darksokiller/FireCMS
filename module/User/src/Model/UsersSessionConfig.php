<?php
namespace User\Model;

use Laminas\Session\Config\SessionConfig;

class UsersSessionConfig extends SessionConfig
{
    protected $name = '_FireCMS';
    protected $rememberMeSeconds = 300;
    public function __construct() {
        
    }
    public function  setOptions($options)
    {
        return $this;
    }
}