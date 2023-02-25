<?php
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;

    $this->title = 'Войти';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => '{label}{input}{error}',
            ],
        ]);

        echo $form->field($model, 'username')->textInput();
        echo $form->field($model, 'password')->passwordInput();
        echo $form->field($model, 'rememberMe')->checkbox();
        echo "<br>";
        echo Html::submitButton("Войти", ['class' => 'btn btn-success']);
    ?>

    <?php ActiveForm::end(); ?>
</div>