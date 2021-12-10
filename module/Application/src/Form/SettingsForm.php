<?php
namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element\Password;
use Laminas\Form\Element\Checkbox;
use Laminas\Form\Element\Textarea;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Submit;
use Laminas\Form\Element\Fieldset;
use Laminas\Mail\Header\Subject;
use Laminas\Form\Element;
use PhpParser\Node\Stmt\Foreach_;
// use Application\Model\SettingsTable as Settings;
// use Laminas\Db\TableGateway\TableGateway;

/**
 *
 * @author Evan Alexander
 *
 */
class SettingsForm extends Form
{
    
    public function __construct($name, $options = [])
    {
        parent::__construct('appSettings');
        parent::setOptions($options);
        
        $appSettings = $this->getOptions();
        
        
        foreach ($appSettings as $setting) {
            
            foreach ($setting as $data) {
                switch (strtolower($data['settingType'])) {
                    case 'checkbox' :
                        $element = new Checkbox();
                        $element->setName($data['variable']);
                        $element->setValue($data['value']);
                        $element->setLabel($data['label']);
                        $element->setLabelAttributes(['class' => 'form-control-sm']);
                        $this->add($element);
                 break;
             case 'text' :
                         $element = new Text();
                         $element->setName($data['variable']);
                         $element->setValue($data['value']);
                         $element->setLabel($data['label']);
                         $element->setAttribute('class', 'form-control');
                         $this->add($element);
                  break;
               case 'textarea' :
                   $element = new Textarea();
                   $element->setName($data['variable']);
                   $element->setLabel($data['lebel']);
                   $element->setValue($data['value']);
                   $element->setAttribute('class', 'form-control');
                   $this->add($element);
            break;   
        default:
            break;
                }
            }
        }
        
    }
}