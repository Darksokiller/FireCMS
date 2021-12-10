<?php
namespace Application\Filter;

use Laminas\Filter\AbstractFilter;
use \DateTime;
use \DateTimeZone;

class FirecmsTime extends AbstractFilter 
{
    const FIRECMS_FORMAT = 'j-m-y g:i:s';
    const FIRECMS_TIMEZONE = 'America/Chicago';
    
    public $now;
    public $format;
    public $timezone;
    
    public function __construct($now = true, $format = null, $timezone = null)
    {
        $this->now = $now;
        $this->format = $format;
        $this->timezone = $timezone;
    }
    
    public function filter($value)
    {
        $now = new DateTime();
        $now->setTimezone(new \DateTimeZone(FIRECMS_TIMEZONE));
        $now->format(FIRECMS_FORMAT);
        return $now;
    }
}