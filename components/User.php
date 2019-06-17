<?php

namespace app\components;

class User extends \yii\web\User
{
    /**
     * Возвращает роль пользователя или `null`.
     * @return string|null
     */
    public function getRole()
    {
        $identity = $this->getIdentity();
        return $identity !== null ? $identity->role : null;
    }
}