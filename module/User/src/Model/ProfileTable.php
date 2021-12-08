<?php
namespace User\Model;
use Application\Model\AbstractModel;
use RuntimeException;
use Laminas\Session;
use User\Model\User as User;
use User\Model\UserTable as UserTable;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Laminas\Validator\EmailAddress as emailValidater;
use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter as AuthAdapter;
use Laminas\Authentication\AuthenticationService as AuthService;
use Laminas\Authentication\Result;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\Sql\Select;

class ProfileTable extends AbstractModel
{
    protected $userTable;
    protected $user;
    
    /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param field_type $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    
    public function setUserTable($userTable)
    {
        $this->userTable = $userTable;
    }
    public function getUserTable()
    {
        return $this->userTable;
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
        //unset($row->password);
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $email
                ));
        }
        
        return $row;
    }
    public function fetchById($userId)
    {
        $userId = (int) $userId;
        $rowset = $this->tableGateway->select(['userId' => $userId]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf('Could not find row with identifier %d', $userId));
        }
        return $row;
        return $row;
    }
    //     public function getUser($id)
    //     {
    //         $id = (int) $id;
    //         $rowset = $this->tableGateway->select(['id' => $id]);
    //         $row = $rowset->current();
    //         if (! $row) {
    //             throw new RuntimeException(sprintf(
    //                 'Could not find row with identifier %d',
    //                 $id
    //                 ));
    //         }
    
    //         return $row;
    //     }
    
    public function saveUser(User $user)
    {
        $data = [
            'userName' => $user->userName,
            'email' => $user->email,
            'password'  => $user->password,
        ];
        
        $id = (int) $user->id;
        
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        
        try {
            $this->getUser($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update User with identifier %d; does not exist',
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
?>