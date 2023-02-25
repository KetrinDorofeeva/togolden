<?php
    use yii\helpers\Html;

    $this->title = 'Редактировать компанию ' . $model->name;
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Редактировать компанию ' . $model->name;
?>

<div class="companies-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>