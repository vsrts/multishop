<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.12.2018
 * Time: 11:04
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;

class AppAdminController extends Controller
{
    public function behaviors(){
        return[
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ]
        ];
    }
}