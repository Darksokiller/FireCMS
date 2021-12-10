<?php
namespace Application\Model;

class Setting
{
    public $id;
    public $variable;
    public $value;
    public $settingType;
    
    public function exchangeArray($data)
    {
        $this->variable = !empty($data['variable']) ? $data['variable'] : null;
        $this->value = !empty($data['value']) ? $data['value'] : null;
        $this->settingType = !empty($data['value']) ? $data['value'] : null;
        $this->label = !empty($data['label']) ? $data['label'] : null;
    }
}