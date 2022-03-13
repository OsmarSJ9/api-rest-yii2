<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permission".
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $is_staff
 *
 * @property Users[] $users
 * @property UsersPermission[] $usersPermissions
 */
class Permission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_staff'], 'integer'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'is_staff' => 'Is Staff',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id' => 'users_id'])->viaTable('users_permission', ['permission_id' => 'id']);
    }

    /**
     * Gets query for [[UsersPermissions]].
     *
     * @return \yii\db\ActiveQuery|UsersPermissionQuery
     */
    public function getUsersPermissions()
    {
        return $this->hasMany(UsersPermission::className(), ['permission_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PermissionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PermissionQuery(get_called_class());
    }
}
