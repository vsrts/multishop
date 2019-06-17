<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.04.2019
 * Time: 16:10
 */

namespace app\commands;

use yii\console\Controller;
use Yii;
use app\rbac\UserRoleRule;
use app\models\User;

class RbacController extends Controller
{
    public function actionInitRbac()
    {
        $auth = Yii::$app->getAuthManager();
        $auth->removeAll();

        $userRoleRule = new UserRoleRule;
        $auth->add($userRoleRule);

        $root = $auth->createRole(User::ROLE_ROOT);
        $root->ruleName = $userRoleRule->name;
        $auth->add($root);
        $admin = $auth->createRole(User::ROLE_ADMIN);
        $admin->ruleName = $userRoleRule->name;
        $auth->add($admin);
        $manager = $auth->createRole(User::ROLE_MANAGER);
        $manager->ruleName = $userRoleRule->name;
        $auth->add($manager);


        $auth->addChild($admin, $manager);
        $auth->addChild($root, $admin);
    }
}