<?php
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;
?>

<div class="companies-form">
    <?php
        $form = ActiveForm::begin();
            echo $form->field($model, 'name')->textInput();
            echo $form->field($model, 'inn')->textInput();
            echo $form->field($model, 'general_information')->textarea(['rows' => 6]);
            echo $form->field($model, 'general_manager')->textInput();
            echo $form->field($model, 'address')->textarea(['rows' => 6]);
            echo $form->field($model, 'phone')->textInput();
    ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>