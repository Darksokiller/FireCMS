<?php
namespace Application\Log;

interface LoggableInterface
{
    public function save($data);
    public function update($data);
    public function send();
}