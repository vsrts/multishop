<?php

namespace app\rbac;

use Yii;
use yii\rbac\Rule;
use app\models\User;

class UserRoleRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'userRole';

    private $_assignments = [];

    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        if ($role = $this->userRole($user)) {
            switch ($item->name) {
                case User::ROLE_ROOT:
                    return $role == User::ROLE_ROOT;

                case User::ROLE_ADMIN:
                    return $role == User::ROLE_ROOT || $role == User::ROLE_ADMIN;

                case User::ROLE_MANAGER:
                    return in_array($role, [User::ROLE_ROOT, User::ROLE_ADMIN, User::ROLE_MANAGER]);
            }
        }
        return false;
    }

    /**
     * @param integer|null $userId ID of user.
     * @return string|false
     */
    protected function userRole($userId)
    {
        $user = Yii::$app->user;
//        if ($userId === null) {
//            if ($user->isGuest) {
//                return User::ROLE_GUEST;
//            }
//            return false;
//        }
        if (!isset($this->_assignments[$userId])) {
            $role = false;
            if (!$user->isGuest && $user->id == $userId) {
                $role = $user->role;
            } elseif ($user->isGuest || $user->id != $userId) {
                $role = User::getRoleOfUser($userId);
            }
            $this->_assignments[$userId] = $role;
        }
        return $this->_assignments[$userId];
    }

}