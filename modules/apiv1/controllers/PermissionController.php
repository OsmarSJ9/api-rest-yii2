<?php

namespace app\modules\apiv1\controllers;

use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;

/**
 * Default controller for the `apiv1` module
 */
class PermissionController extends ActiveController
{
    // Para personalizar respuesta
    public $modelClass = 'app\modules\apiv1\models\Permission';
    // public $modelClass = 'app\models\Users';

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
                        'id' => SORT_ASC,
                    ],
                ],
            ],
        ]);
    }
}
