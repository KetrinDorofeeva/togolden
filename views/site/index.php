<?php
    use yii\bootstrap4\Html;
    use yii\bootstrap4\LinkPager;

    $this->title = 'Компании';
?>

<div class="container">
    <div class="body-content">
        <div class="row">
            <?php
                foreach ($model as $company) {
            ?>
                    <div class="col-lg-3 bg-dark company_block">
                        <?php 
                            echo "<a href = '/site/view/$company->id'>";
                                echo "<span style='color: #FFC134; font-weight: bold'>" . $company->name . "</span><br>";
                                echo "<span class = 'title_company'>Адрес: </span>" . $company->address . "<br>";
                                echo "<span class = 'title_company'>Телефон: </span>" . $company->phone . "<br>";
                                echo "<span class = 'title_company'>Генеральный директор: </span>" . $company->general_manager;
                            echo "</a>";

                            if (!Yii::$app->user->isGuest) {
                                echo "<div style='margin-left: 96%'>" .
                                    "<div style='padding-bottom: 15px'>" . Html::a(Html::img('@web/img/pencil-fill.svg'), ['update', 'id' => $company->id]) . "</div>" .

                                    Html::a(Html::img('@web/img/trash-fill.svg'), ['delete', 'id' => $company->id], [
                                        'data' => [
                                            'confirm' => 'Вы уверены, что хотите удалить эту компанию?',
                                            'method' => 'post',
                                        ]
                                    ]) .
                                "</div>";
                            }
                        ?>
                    </div>
            <?php } ?>
        </div>

        <div class="mt-4">
            <?php
                if (!Yii::$app->user->isGuest) {
                    echo Html::a('Новая компания', ['create'], ['class' => 'btn btn-success']);
                }
            ?>
        </div>
    </div><br>

    <?= LinkPager::widget([
            'pagination' => $pages,
        ]);
    ?>
</div>