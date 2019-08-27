<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Создает роль "User" без разрешений
        $user = $auth->createRole('user');
        $auth->add($user);

        // Создает разрешение управлять backend
        $backend = $auth->createPermission('manageBackend');
        $backend->description = 'Allows manage backend';
        $auth->add($backend);

        // Создает роль "admin" и дает роли разрешение "manageBackend"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $backend);

        // Назначает роль "admin" пользователю
        $auth->assign($admin, 7);
    }

    /**
     * Assigns role "admin" for user.
     *
     * @param string $id Primary key of user which should be assigned as "admin".
     * @throws \Exception
     */
    public function actionAssignAdmin($id)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole('admin');
        $auth->assign($role, $id);
    }
}