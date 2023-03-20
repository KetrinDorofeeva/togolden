<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\web\Response;
    use yii\filters\VerbFilter;
    use app\models\RegistrationForm;
    use app\models\LoginForm;
    use app\models\Companies;
    use app\models\CompaniesSearch;
    use app\models\Comments;
    use yii\data\Pagination;

    class SiteController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout', 'my', 'create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['logout', 'my', 'create', 'update', 'delete'],
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

        //Компании
        public function actionIndex()
        {
            $query = Companies::find();
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
            $model = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['id' => SORT_DESC])->all();

            return $this->render('index', compact('model', 'pages'));
        }

        //Мои компании
        public function actionMy()
        {
            $searchModel = new CompaniesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('my', compact('searchModel', 'dataProvider'));
        }

        //Регистрация
        public function actionRegistration() {
            $model = new RegistrationForm();

            if ($model->load(Yii::$app->request->post()) && $model->registration()) {
                return $this->goHome();
            }

            return $this->render('registration', compact('model'));
        }

        //Авторизация
        public function actionLogin()
        {
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }

            $model->password = '';
            return $this->render('login', compact('model'));
        }

        //Выход из личного кабинета пользователя
        public function actionLogout()
        {
            Yii::$app->user->logout();

            return $this->goHome();
        }

        //Страница компании
        public function actionView($id)
        {
            $model = Companies::findOne(['id' => $id]);
            $model_c = Comments::find($id)->where(['=', 'id_company', $id])->orderBy(['time_comment' => SORT_DESC])->all();

            //Добавить комментарий
            $model_cr = new Comments();

            if ($model_cr->load(Yii::$app->request->post())) {
                $model_cr->id_company = $id;
                $model_cr->id_user = Yii::$app->user->identity->id;
                $model_cr->time_comment = date('Y-m-d H:i:s');

                Yii::$app->session->setFlash('success', "Комментарий успешно добавлен");
    
                if ($model_cr->save(false)) {
                    return $this->redirect(['view', 'id' => $id]);
                }
            }

            return $this->render('view', compact('model', 'model_c', 'model_cr'));
        }

        //Добавить новую компанию
        public function actionCreate()
        {
            $model = new Companies();
    
            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $model->id_user = Yii::$app->user->identity->id;

                    Yii::$app->session->setFlash('success', "Новая компания успешно добавлена");
                    
                    if ($model->save()) {
                        return $this->redirect(['index', 'id' => $model->id]);
                    }
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', compact('model'));
        }

        //Редактировать компанию
        public function actionUpdate($id)
        {
            $model = Companies::findOne($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', "Компания успешно обновлена");
                
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', compact('model'));
        }

        //Удалить компанию
        public function actionDelete($id)
        {
            $model = Companies::findOne($id);

            Companies::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Компания успешно удалена");

            return $this->redirect(['/site/index']);
            return $this->render(compact('model'));
        }
    }
?>