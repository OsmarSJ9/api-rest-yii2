<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UsersPermission]].
 *
 * @see UsersPermission
 */
class UsersPermissionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UsersPermission[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UsersPermission|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
