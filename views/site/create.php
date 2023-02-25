<?php
    use yii\helpers\Html;

    $this->title = 'Новая компания';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="companies-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>