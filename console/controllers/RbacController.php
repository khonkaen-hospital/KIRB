<?php
namespace console\controllers;

use common\models\User;
use common\rbac\OwnModelRule;
use common\rbac\SubmissionRule;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $user = $auth->createRole(User::ROLE_USER);
        $auth->add($user);

        // own model rule
        $ownModelRule = new OwnModelRule();
        $auth->add($ownModelRule);

        $submissionRule = new SubmissionRule();
        $auth->add($submissionRule);

        $updateOwnResearch = $auth->createPermission('updateOwnResearch');
        $updateOwnResearch->description = 'update research by status';
        $updateOwnResearch->ruleName = $submissionRule->name;
        $auth->add($updateOwnResearch);
        
        $auth->addChild($user, $updateOwnResearch);


        $manager = $auth->createRole(User::ROLE_MANAGER);
        $auth->add($manager);
        $auth->addChild($manager, $user);

        $loginToBackend = $auth->createPermission('loginToBackend');
        $auth->add($loginToBackend);
        $auth->addChild($manager, $loginToBackend);

        $admin = $auth->createRole(User::ROLE_ADMINISTRATOR);
        $auth->add($admin);
        $auth->addChild($admin, $manager);

        $auth->assign($admin, 1);
        $auth->assign($manager, 2);
        $auth->assign($user, 3);

        Console::output('Success! RBAC roles has been added.');
    }
}
