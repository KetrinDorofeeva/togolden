<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;

    $this->title = 'Редактировать профиль';
    $this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['page', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Редактировать профиль';
?>

<div class="personal-form">
    <?php $form = ActiveForm::begin([
            'id' => 'mypersonal',
            'method' => 'post',
            'fieldConfig' => [
                'template' => '{label} {input}<span style="color: #dc3545">{error}</span>',
            ],
        ]); ?>

        <div class="row mb-4">
            <img src="/web/<?= Yii::$app->user->identity->avatar ?>" class="col-lg-3 col-md-12">
        </div>
    <?php
        echo $form->field($model, 'avatar')->fileInput();
        echo $form->field($model, 'surname', ['template' => '{label}<span class="star"> *</span>{input}<span style="color: #dc3545">{error}</span>'])->textInput();
        echo $form->field($model, 'name', ['template' => '{label}<span class="star"> *</span>{input}<span style="color: #dc3545">{error}</span>'])->textInput();
        echo $form->field($model, 'middle_name')->textInput();
        echo $form->field($model, 'gender', ['template' => '{label}<span class="star"> *</span>{input}<span style="color: #dc3545">{error}</span>'])->radioList([1 => 'Мужчина', 2 => 'Женщина']);
        
        echo $form->field($model, 'date_birth', ['template' => '{label}<span class="star"> *</span>{input}<span style="color: #dc3545">{error}</span>'])->widget(DatePicker::classname(), [
            'options' => [
                'placeholder' => 'гггг-мм-дд'
            ],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'endDate' => '-18y',
                'todayHighlight' => true
            ]
        ]);

        echo $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 (999) 999-99-99'])->textInput();
        echo $form->field($model, 'email', ['template' => '{label}<span class="star"> *</span>{input}<span style="color: #dc3545">{error}</span>'])->textInput();
        echo $form->field($model, 'address', ['template' => '{label}<span class="star"> *</span>{input}<span style="color: #dc3545">{error}</span>'])->textInput();
        echo $form->field($model, 'description')->textarea();
        echo "<br>";
        echo Html::submitButton("Сохранить", ['class' => 'btn btn-success']);
    ActiveForm::end(); ?>
</div>