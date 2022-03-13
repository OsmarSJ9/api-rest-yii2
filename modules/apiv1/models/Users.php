<?php

namespace app\modules\apiv1\models;

/**
 * Default controller for the `apiv1` module
 */
class Users extends \app\models\Users
{
    public function fields()
    {
        return [
            'id','username','age'
        ];
    }
    public function extraFields()
    {
        return [
            'age'
        ];
    }
    
}
