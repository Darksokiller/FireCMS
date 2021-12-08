<?php
namespace User\Model;
use DomainException;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;
use User\Filter\PasswordFilter;
use Laminas\Permissions\Acl\ProprietaryInterface;
use Laminas\Permissions\Acl\Resource\ResourceInterface;
use Laminas\Permissions\Acl\Role\RoleInterface;
use Laminas\Filter\StringToLower;

class Profile implements ResourceInterface, ProprietaryInterface
{
    protected $resourceId = 'profile';
    public $id;
    public $userId;
    public $firstName;
    public $lastName;
    public $avatarPath;
    public $age;
    public $birthday;
    public $gender;
    public $race;
    public $bio;
    
    private $inputFilter;
    
    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->userId = !empty($data['userId']) ? $data['userId'] : null;
        $this->firstName = !empty($data['firstName']) ? $data['firstName'] : null;
        $this->lastName  = !empty($data['lastName']) ? $data['lastName'] : null;
        $this->avatarPath  = !empty($data['avatarPath']) ? $data['avatarPath'] : null;
        $this->age = !empty($data['age']) ? $data['age'] : null;
        $this->birthday = !empty($data['birthday']) ? $data['birthday'] : null;
        $this->gender = !empty($data['gender']) ? $data['gender'] : null;
        $this->race = !empty($data['race']) ? $data['race'] : null;
        $this->bio = !empty($data['bio']) ? $data['bio'] : null;
        return $this;
    }
    public function setServiceManager($serviceManager)
    {
        $this->servicemanager = $serviceManager;
    }
    /**
     * {@inheritDoc}
     * @see \Laminas\Permissions\Acl\ProprietaryInterface::getOwnerId()
     */
    public function getOwnerId()
    {
        // TODO Auto-generated method stub
        return $this->id;
    }
    
    /**
     * {@inheritDoc}
     * @see \Laminas\Permissions\Acl\Role\RoleInterface::getRoleId()
     */
    public function getRoleId()
    {
        // TODO Auto-generated method stub
        return $this->role;
    }
    public function getResourceId()
    {
        return $this->resourceId;
    }
    // Add the following method:
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'userId' => $this->userId,
            'firstName' => $this->firstName,
            'lastName'  => $this->lastName,
            'avatarPath' => $this->avatarPath,
            'age' => $this->age,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'race' => $this->race,
            'bio' => $this->bio,
        ];
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
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
            'filters' => [
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
        return $this->inputFilter;
    }
    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }
    
}
?>