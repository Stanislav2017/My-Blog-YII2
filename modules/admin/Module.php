<?php

namespace app\modules\admin;
use const true;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = "/admin";
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function($rule, $action) {
                    throw new NotFoundHttpException();
                },
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function($rule, $action) {
                            return Yii::$app->user->identity->is_admin;
                        }
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
