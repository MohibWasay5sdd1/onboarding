<?php

namespace api\modules\v1\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $role_id
 * @property string $user_name
 * @property string $first_name
 * @property string $last_name
 * @property string $user_email
 * @property string $user_password
 * @property string $reset_token
 * @property string $reset_expiry
 * @property string $last_login
 * @property string $login_status
 * @property string $created_on
 * @property string $modified_on
 */
class users extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['role_id', 'user_name', 'user_email', 'user_password', 'login_status', 'created_on', 'modified_on','status'], 'required'],
            [['role_id'], 'integer'],
            [['reset_expiry', 'last_login', 'created_on', 'modified_on'], 'safe'],
            [['user_name', 'user_email', 'user_password'], 'string', 'max' => 100],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['reset_token'], 'string', 'max' => 250],
            [['login_status','status'], 'string', 'max' => 25],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'user_name' => 'User Name',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'user_email' => 'User Email',
            'user_password' => 'User Password',
            'reset_token' => 'Reset Token',
            'reset_expiry' => 'Reset Expiry',
            'last_login' => 'Last Login',
            'login_status' => 'Login Status',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
        ];
    }

    public function getUserByEmail($user_email)
    {
        $connection = Yii::$app->db;
        $sql  = "SELECT * FROM users WHERE user_email = :email";
        $command = $connection->createCommand($sql);
        $command->bindValue(':email' , $user_email);
        $rows_email = $command->queryOne();
        if ($rows_email) {
            return $rows_email; 
        } else {
            return false;
        }
    }
    
    public function getUserByUsername($user_name)
    {
        $connection = Yii::$app->db;
        $sqlname  = "SELECT * FROM users WHERE user_name= :username";
        $command = $connection->createCommand($sqlname);
        $command->bindValue(':username' , $user_name);
        $rows_username = $command->queryOne();
        if ($rows_username) {
            return true; 
        } else {
            return false;
        }
    }

    public function createUser($user_name,$user_first_name,$user_last_name,$user_full_name,$user_email,$user_pass,$role_id)
    {
        $model = new Users();
        $model->user_name        =   (empty($user_name)) ? "" : $user_name;
        $model->first_name   =   (empty($user_first_name)) ? "" : $user_first_name;
        $model->last_name    =   (empty($user_last_name)) ? "" : $user_last_name;
        $model->full_name    =   (empty($user_full_name)) ? "" : $user_full_name;
        $model->user_email=  $user_email;     
        $model->user_password = password_hash($user_pass, PASSWORD_DEFAULT);
        $model->reset_token = null;
        $model->reset_expiry = null;
        $model->last_login= null;
        $model->login_status= 'normal';
        $model->created_on=date('Y-m-d H:i:s');
        $model->modified_on=date('Y-m-d H:i:s');
        $model->role_id = $role_id; // 2 for users 
        $model->status = 'Unverified';
        if ($model->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByStatus($user_email,$status)
    {
        $connection = Yii::$app->db;
        $sql  = "SELECT * FROM users WHERE user_email= :useremail AND status = :status";
        $command = $connection->createCommand($sql);
        $command->bindValue(':useremail' , $user_email);
        $command->bindValue(':status' , $status);
        $rows_user = $command->queryOne();
        if ($rows_user) {
            return $rows_user; 
        } else {
            return null;
        }
    }
    public function updateToken($user_email,$reset_token,$reset_expiry,$status)
    {
        $connection = Yii::$app->db;
        if ($status!=null) {
            $sql  = "UPDATE users SET reset_token = null, reset_expiry = null, status = :status, modified_on = NOW() WHERE user_email = :email";
            $command = $connection->createCommand($sql);
            $command->bindValue(':email' , $user_email);
            $command->bindValue(':status' , $status);
            $rows_email = $command->execute();
        } else {
            $sql  = "UPDATE users SET reset_token = :resettoken, reset_expiry = :resetexpiry, modified_on = NOW() WHERE user_email = :email";
            $command = $connection->createCommand($sql);
            $command->bindValue(':resettoken' , $reset_token);
            $command->bindValue(':resetexpiry' , $reset_expiry);
            $command->bindValue(':email' , $user_email);
            $rows_email = $command->execute();

        }
        if ($rows_email) {
            $model = $this->getUserByEmail($user_email);
            if($model) {
                return $model;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function updateUserPassword($email,$password)
    {
        $connection = Yii::$app->db;
        $sql  = "UPDATE users SET user_password = :password, modified_on = NOW() WHERE user_email = :email";
        $command = $connection->createCommand($sql);
        $command->bindValue(':password' , $password);
        $command->bindValue(':email' , $email);
        $rows_email = $command->execute();
        if($rows_email) {
            return $rows_email;
        } else {
            return false;
        }
    }

    
}
