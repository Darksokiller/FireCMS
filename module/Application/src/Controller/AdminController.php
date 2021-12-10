<?php
namespace Application\Controller;
//use Application\Model\ApplicationTable;
use Application\Controller\AbstractAdminController;
use Application\Form\SettingsForm;
use Laminas\Form\FormInterface;
use Laminas\Form\Element\Checkbox;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Textarea;
use Laminas\Form\Element;
use Laminas\Form\Form;

class AdminController extends AbstractAdminController
{
    public function indexAction()
    {
        // get an instance of the service manager
        $sm = $this->getEvent()->getApplication()->getServiceManager();
        // get the settings table from the service manager
        $settingsTable = $sm->get('Application\Model\SettingsTableGateway');
        //$sForm = new SettingsForm('appSettings', ['aSettings' => $settingsTable->fetchSettingsForForm()]);
        $appSettings = $settingsTable->fetchSettingsForForm();
        // var_dump($appSettings);
        $form = new Form('appSettings');
        switch(!$this->getRequest()->isPost()) {
            case true:
                foreach ($appSettings as $data) {
                    //var_dump($data);
                    switch(strtolower($data['settingType'])) {
                        case 'checkbox' :
                            $element = new Checkbox();
                            $element->setName($data['variable']);
                            $element->setValue($data['value']);
                            $element->setLabel($data['label']);
                            // $element->setAttribute('class', 'form-control');
                            $element->setLabelAttributes(['class' => 'form-control-sm']);
                            //$element->setLabelOption('position', 'top');
                            $form->add($element);
                            break;
                        case 'text' :
                            $element = new Text();
                            $element->setName($data['variable']);
                            $element->setValue($data['value']);
                            $element->setLabel($data['label']);
                            $element->setAttribute('class', 'form-control');
                            //$element->setLabelAttributes(['class' => 'form-control']);
                            //$element->setOption('order', $data['id']);
                            $form->add($element);
                            break;
                        case 'textarea' :
                            $element = new Textarea();
                            $element->setName($data['variable']);
                            $element->setLabel($data['label']);
                            //$element->setLabelAttributes(['class' => 'form-control']);
                            $element->setValue($data['value']);
                            //$element->setOption('order', $data['id']);
                            $element->setAttribute('class', 'form-control');
                            $form->add($element);
                            break;
                        default:
                            break;
                    }
                }
                
                $this->view->setVariable('form',$form);
                break;
            case false:
                $post = (array)$this->getRequest()->getPost();
                var_dump($post);
                foreach ($appSettings as $data) {
                    // var_dump($data);
                    switch(strtolower($data['settingType'])) {
                        case 'checkbox' :
                            $element = new Checkbox();
                            $element->setName($data['variable']);
                            // $element->setValue($data['value']);
                            $element->setLabel($data['label']);
                            // $element->setAttribute('class', 'form-control');
                            $element->setLabelAttributes(['class' => 'form-control-sm']);
                            //$element->setLabelOption('position', 'top');
                            $form->add($element);
                            break;
                        case 'text' :
                            $element = new Text();
                            $element->setName($data['variable']);
                            // $element->setValue($data['value']);
                            $element->setLabel($data['label']);
                            $element->setAttribute('class', 'form-control');
                            //$element->setLabelAttributes(['class' => 'form-control']);
                            //$element->setOption('order', $data['id']);
                            $form->add($element);
                            break;
                        case 'textarea' :
                            $element = new Textarea();
                            $element->setName($data['variable']);
                            $element->setLabel($data['label']);
                            //$element->setLabelAttributes(['class' => 'form-control']);
                            //$element->setValue($data['value']);
                            //$element->setOption('order', $data['id']);
                            $element->setAttribute('class', 'form-control');
                            $form->add($element);
                            break;
                        default:
                            break;
                    }
                }
                // at this point it should be post
                $form->setData($post);
                // var_dump($data);
                foreach($post as $variable => $value) {
                    if($form->has($variable)) {
                        $element = $form->get($variable);
                        $element->setValue($value);
                    }
                }
                //var_dump($form->getData(FormInterface::VALUES_AS_ARRAY));
                if(!$form->isValid()){
                    return $this->view->setVariable('form', $form);
                }
                $this->view->setVariable('form', $form);
                //var_dump($form->getData(FormInterface::VALUES_AS_ARRAY));
                $settingsTable->save($form->getData(FormInterface::VALUES_AS_ARRAY));
                $this->redirect()->refresh();
                break;
            default:
                
                break;
        }
        // Send the data, including the form to the view
        return $this->view;
    }
    public function addsettingAction()
    {
        //$this->resourceId = 'admin.add.setting';
        if(!$this->acl->isAllowed($this->user, $this, 'admin.add.setting'))
        {
            $this->flashMessenger()->addWarningMessage('Access Denied, your attempt to access this area as been logged');
            $this->redirect()->toRoute('forbidden');
        }
    }
    
}