<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Главная';
    $this->params['breadcrumbs'][] = 'Мои компании';
?>

<div class="my-index">
    <h1>Мои компании</h1>

    <div class="mt-4">
        <?php
            echo Html::a('Новая компания', ['create'], ['class' => 'btn btn-success']);
        ?>
    </div>

    <div class="table-responsive mt-4">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function($data) {
                        return '<a href = "/site/view/'.$data->id.'">' . $data->name . '</a>';
                    }
                ],
                'inn',
                'general_information',
                'general_manager',
                'address',
                'phone',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>