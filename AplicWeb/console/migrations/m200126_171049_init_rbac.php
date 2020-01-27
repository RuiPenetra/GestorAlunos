<?php

use yii\db\Migration;

/**
 * Class m200126_171049_init_rbac
 */
class m200126_171049_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        // Criar premissoes no CRUD Users
        $viewUser = $auth->createPermission('viewUser');
        $viewUser->description = 'Ver User';
        $auth->add($viewUser);

        $findUser = $auth->createPermission('findUser');
        $findUser->description = 'Procurar User';
        $auth->add($findUser);

        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Criar User';
        $auth->add($createUser);

        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Atualizar User';
        $auth->add($updateUser);

        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = 'Apagar User';
        $auth->add($deleteUser);
        // fim das premissoes do user




        //  $author = $auth->createRole('author');
        //  $auth->add($author);
        //  $auth->addChild($author, $createAluno);

        // Criar role admin e darlhe premissoes existentes
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $viewUser);
        $auth->addChild($admin, $findUser);
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $deleteUser);
        //$auth->addChild($admin, $professor);

        // Associar roles aos users.
        //$auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
