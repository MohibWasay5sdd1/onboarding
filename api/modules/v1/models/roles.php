<?php

namespace api\modules\v1\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string $name
 * @property string $created_on
 * @property string $modified_on
 */
class roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_on', 'modified_on'], 'required'],
            [['created_on', 'modified_on'], 'safe'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
        ];
    }

    public function getRoleId($user_type)
    {
        $connection = Yii::$app->db;
        $sql  = "SELECT * FROM roles WHERE name= :usertype";
        $command = $connection->createCommand($sql);
        $command->bindValue(':usertype' , $user_type);
        $rows_role = $command->queryOne();
        if ($rows_role) {
            return $rows_role['id']; 
        } else {
            return false;
        }
    }
}
