<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use app\models\Personal;

    class PersonalController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['personal', 'update'],
                    'rules' => [
                        [
                            'actions' => ['personal', 'update'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post', 'get'],
                    ],
                ],
            ];
        }

        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                    'class' => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
            ];
        }

        //Личный кабинет пользователя
        public function actionPage() {
            return $this->render('page');
        }

        //Редактировать информацию о пользователе
        public function actionUpdate($id)
        {
            $model = Personal::findOne($id);
            $model->avatar_now = $model->avatar;

            if ($model->load(\Yii::$app->request->post()) && $model->uppage()) {
            
            }

            return $this->render('update', compact('model'));
        }
    }
?>