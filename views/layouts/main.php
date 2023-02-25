<?php
    use app\assets\AppAsset;
    use app\widgets\Alert;
    use yii\bootstrap4\Breadcrumbs;
    use yii\bootstrap4\Html;
    use yii\bootstrap4\Nav;
    use yii\bootstrap4\NavBar;

    AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Html::a(Yii::$app->name, [Yii::$app->homeUrl], ['style' => 'color: #FFC134; font-size: 25px; text-decoration: none; margin-right: auto']),
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            'style' => 'border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: #24292D'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            [
                'label' => '<span class="ml-3">' . Html::tag('span', Yii::$app->user->identity->username, ['class' => 'mr-3', 'style' => 'color: #FFC134']) . '</span>',
                'encode' => false, 
                'visible' => !Yii::$app->user->isGuest,
            ],
            [
                'label' => '<span class="ml-3">' . Html::tag('span', 'Компании', ['class' => 'mr-3']) . '</span>',
                'encode' => false,
                'url' => ['/site/index'],
            ],
            [
                'label' => '<span class="ml-3">' . 'Войти' . Html::img('@web/img/login.svg', ['style' => 'margin-left: 5px']) . '</span>',
                'encode' => false, 
                'url' => ['/site/login'],
                'visible' => \Yii::$app->user->isGuest,
            ],
            [
                'label' => '<span class="ml-3">' . 'Регистрация' . Html::img('@web/img/registration.svg', ['class' => 'mr-3', 'style' => 'margin-left: 5px']) . '</span>',
                'encode' => false, 
                'url' => ['/site/registration'],
                'visible' => \Yii::$app->user->isGuest,
            ],
            [
                'label' => '<span class="ml-3">' . 'Выход' . Html::img('@web/img/login.svg', ['style' => 'margin-left: 5px']) . '</span>', 
                'encode' => false,
                'url' => ['/site/logout'],
                'visible' => !\Yii::$app->user->isGuest,
            ],
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>