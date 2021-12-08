<?php
namespace User\Model;

use Application\Model\AbstractModel;
use RuntimeException;
use User\Model\User as User;
use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter as AuthAdapter;
use Laminas\Authentication\AuthenticationService as AuthService;
use Laminas\Authentication\Result;

class UserTable extends AbstractModel
{
    public function login(User $user)
    {
        //var_dump($user);
        $callback = function($hash, $password) {
            return password_verify($password, $hash);
        };
        
        $authAdapter = new AuthAdapter($this->tableGateway->getAdapter(),
                                       'user',
                                       'email',
                                       'password',
                                       $callback);
        
        
        $authAdapter->setIdentity($user->email)
        ->setCredential($user->getPassword());
        
        $select = $authAdapter->getDbSelect();
        $select->where('active = 1')->where('verified = 1');
        
        $authService = new AuthService();
        $authService->setAdapter($authAdapter);
        $result = $authService->authenticate();
        
        switch ($result->getCode()) {
            
            case Result::SUCCESS:
                /** do stuff for successful authentication **/
                return true;
                break;
                
            case Result::FAILURE_IDENTITY_NOT_FOUND:
                /** do stuff for nonexistent identity **/
                break;
                
            case Result::FAILURE_CREDENTIAL_INVALID:
                /** do stuff for invalid credential **/
                break;
                
            default:
                /** do stuff for other failure **/
                return false;
                break;
        }
    }
    
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
    
    public function getHashByEmail($email) 
    {
        $rowset = $this->tableGateway->select(['email' => $email]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $email
                ));
        }
        return $row->password;
    }
    
    public function getUserByEmail($email, $asArray = false)
    {
        $email = (string) $email;
        $rowset = $this->tableGateway->select(['email' => $email]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $email
                ));
        }
        
        return $row;
    }
    
    public function fetchUserById($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new \RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
                ));
        }
        $row->password = null;
        return $row;
    }
    
    public function getUser($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new \RuntimeException(sprintf(
                'Could not find row with identifier %d'
                ));
        }
        
        return $row;
    }
    
    public function saveUser(User $user)
    {
        
        $data = [
            'userName' => $user->userName,
            'email' => $user->email,
            'password' => $user->password,
        ];
        
        $id = (int) $user->id;
        
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        
        try {
            $this->getUser($id);
        } catch (RuntimeException $e) {
            throw new \RuntimeException(sprintf(
                'Cannot update user with identifier %d; does not exist',
                $id
           ));
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }
    
    public function deleteUser($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}