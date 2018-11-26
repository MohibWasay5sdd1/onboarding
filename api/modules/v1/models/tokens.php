<?php

namespace api\modules\v1\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tokens".
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property string $expiry
 * @property string $created_on
 * @property string $modified_on
 */
class tokens extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'token', 'expiry', 'created_on', 'modified_on'], 'required'],
            [['user_id'], 'integer'],
            [['expiry', 'created_on', 'modified_on'], 'safe'],
            [['token'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'token' => 'Token',
            'expiry' => 'Expiry',
            'created_on' => 'Created On',
            'modified_on' => 'Modified On',
        ];
    }

    public function generateToken($access_token,$user_id,$expiry)
    {
        $model_token = new tokens();
        $model_token->token =$access_token;
        $model_token->user_id = $user_id;
        $model_token->created_on=date('Y-m-d H:i:s');
        $model_token->modified_on=date('Y-m-d H:i:s');
        $model_token->expiry = $expiry;
                
        if ($model_token->save()) {
            return $model_token;
        } else {
        return false;
        }
    }
}
