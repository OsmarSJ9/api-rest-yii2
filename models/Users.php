<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $lastname
 * @property int $age
 * @property string|null $birthday
 *
 * @property Permission[] $permissions
 * @property UsersPermission[] $usersPermissions
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'lastname', 'age'], 'required'],
            [['age'], 'integer'],
            [['birthday'], 'safe'],
            [['username', 'name', 'lastname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'age' => 'Age',
            'birthday' => 'Birthday',
        ];
    }

    /**
     * Gets query for [[Permissions]].
     *
     * @return \yii\db\ActiveQuery|PermissionQuery
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::className(), ['id' => 'permission_id'])->viaTable('users_permission', ['users_id' => 'id']);
    }

    /**
     * Gets query for [[UsersPermissions]].
     *
     * @return \yii\db\ActiveQuery|UsersPermissionQuery
     */
    public function getUsersPermissions()
    {
        return $this->hasMany(UsersPermission::className(), ['users_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
