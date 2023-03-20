<?php
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;
    use kartik\date\DatePicker;

    $this->title = 'Регистрация';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        $form = ActiveForm::begin([
            'id' => 'myform',
            'method' => 'post',
        ]);

            echo $form->field($model, 'surname', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->textInput();
            echo $form->field($model, 'name', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->textInput();
            echo $form->field($model, 'middle_name', ['template' => '{label}{input}{error}'])->textInput();
            echo $form->field($model, 'gender', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->radioList([1 => 'Мужчина', 2 => 'Женщина']);

            echo $form->field($model, 'date_birth', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->widget(DatePicker::classname(), [
                'options' => [
                    'placeholder' => 'гггг-мм-дд'
                ],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'endDate' => '-18y'
                ]
            ]);

            echo $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 (999) 999-99-99'])->textInput();
            echo $form->field($model, 'email', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->textInput();
            echo $form->field($model, 'address', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->textInput();
            echo $form->field($model, 'description')->textarea();
            echo $form->field($model, 'username', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->textInput();
            echo $form->field($model, 'password', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->passwordInput();
            echo $form->field($model, 'confirm_password', ['template' => '{label}<span class="star"> *</span>{input}{error}'])->passwordInput();
            echo "<br>";
            echo Html::submitButton("Зарегистрироваться", ['class' => 'btn btn-success']);
        ActiveForm::end(); 
    ?>
</div>

<script src = "https://api-maps.yandex.ru/2.1?apikey=51785512-ffbb-44c5-9044-7f1ab310d38e&lang=ru_RU" type = "text/javascript"></script>
<script src = "script.js"></script>