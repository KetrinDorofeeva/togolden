<?php
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;

    $this->title = 'Регистрация';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        $form = ActiveForm::begin([
            'id' => 'myform',
            'method' => 'post',
            'fieldConfig' => [
                'template' => '{label}{input}{error}',
            ],
        ]);

            echo $form->field($model, 'username')->textInput();
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'confirm_password')->passwordInput();
            echo "<br>";
            echo Html::submitButton("Зарегистрироваться", ['class' => 'btn btn-success']);
        ActiveForm::end(); 
    ?>
</div>