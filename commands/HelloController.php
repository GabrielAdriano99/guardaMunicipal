<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Usuario;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionLicense(){
        $auth = Yii::$app->authManager;

        // $auth->revokeAll();

        // permissao para agendar a escala
        $scheduleScale = $auth->createPermission('scheduleScale');
        //$scheduleScale->description('Permission to schedule the scale');
        $auth->add($scheduleScale);

        // permissao para atualizar escala
        $updateScale = $auth->createPermission('updateScale');
        //$updateScale->description('Permission to upgrade scale');
        $auth->add($updateScale);

        // permissao para deletar escala
        $deleteScale = $auth->createPermission('deleteScale');
        //$deleteScale->description('Permission to delete scale');
        $auth->add($deleteScale);

        // permissao para criar usuario & guarda
        $createUserGuard = $auth->createPermission('createUserGuard');
        //$createUserGuard->description('Permission to create User and Guard');
        $auth->add($createUserGuard);

        // permissao para atualizar usuario & guarda
        $updateUserGuard = $auth->createPermission('updateUserGuard');
        //$updateUserGuard = $auth->description('Permission to upgrade User and Guard');
        $auth->add($updateUserGuard);

        // permissao para deletar usuario e guarda
        $deleteUserGuard = $auth->createPermission('deleteUserGuard');
        //$deleteUserGuard->description('Permission to delete User and Guard');
        $auth->add($deleteUserGuard);

        // lista contendo todas as permissoes que o papel admin ira possuir
        $listPermAdmin = [
            $scheduleScale,
            $updateScale,
            $deleteScale,
            $createUserGuard,
            $updateUserGuard,
            $deleteUserGuard
        ];

        // criando papel administrador
        $guard = $auth->createRole('guard');
        $auth->add($guard);
        $auth->addChild($guard, $updateUserGuard);

        // criando papel administrador
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        foreach($listPermAdmin as $listPermAdminS){
            $auth->addChild($admin, $listPermAdminS);
        }
        $auth->addChild($admin, $guard);

        $objAdmin = Usuario::findOne(['type' => 'admin']);
        $objGuard = Usuario::findOne(['type' => 'guard']);

        // atribuir os papeis aos usuarios
        $auth->assign($admin, $objAdmin->idUsuario);
        $auth->assign($guard, $objGuard->idUsuario);

    }
}
