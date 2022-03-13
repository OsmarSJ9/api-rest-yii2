<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_permission".
 *
 * @property int $users_id
 * @property int $permission_id
 *
 * @property Permission $permission
 * @property Users $users
 */
class UsersPermission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_permission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users_id', 'permission_id'], 'required'],
            [['users_id', 'permission_id'], 'integer'],
            [['users_id', 'permission_id'], 'unique', 'targetAttribute' => ['users_id', 'permission_id']],
            [['permission_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permission::className(), 'targetAttribute' => ['permission_id' => 'id']],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'users_id' => 'Users ID',
            'permission_id' => 'Permission ID',
        ];
    }

    /**
     * Gets query for [[Permission]].
     *
     * @return \yii\db\ActiveQuery|PermissionQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::className(), ['id' => 'permission_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersPermissionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersPermissionQuery(get_called_class());
    }
}
