<?php
    use yii\helpers\Html;

    $this->title = 'Профиль';
    $this->params['breadcrumbs'][] = 'Профиль';
?>

<div class="personal-index">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 mt-3 ml-auto mr-auto personal_block img">
            <img src="/web/<?= Yii::$app->user->identity->avatar ?>" class="avatar_img">
        </div>

        <div class="col-lg-4 col-md-7 col-sm-12 mt-3 ml-auto mr-auto personal_block">
            <span class="block">
                <span class="data">Фамилия:</span><?= Yii::$app->user->identity->surname ?>
            </span>
            <span class="block">
                <span class="data">Имя:</span><?= Yii::$app->user->identity->name ?>
            </span>
            <?php if (Yii::$app->user->identity->middle_name != NULL) { ?>
                <span class="block">
                    <span class="data">Отчество:</span><?= Yii::$app->user->identity->middle_name ?>
                </span>
            <?php } ?>
            <span class="block">
                <span class="data">Пол:</span> 
                
                <?php if (Yii::$app->user->identity->gender == 1) {
                    echo "Мужчина";
                } else {
                    echo "Женщина";
                } ?>
            </span>
            <span class="block">
                <span class="data">Дата рождения:</span><?= date("d.m.Y", strtotime(Yii::$app->user->identity->date_birth)) ?>
            </span>
            <span class="block grey">
                <span class="data">Дата регистрации:</span><?= date("d.m.Y", strtotime(Yii::$app->user->identity->registration_date)) ?>
            </span>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 mt-3 ml-auto mr-auto personal_block">
            <?php if (Yii::$app->user->identity->phone != NULL) { ?>
                <span class="block">
                    <span class="data">Телефон:</span><?= Yii::$app->user->identity->phone ?>
                </span>
            <?php } ?>
            <span class="block">
                <span class="data">Email:</span><?= Yii::$app->user->identity->email ?>
            </span>
            <span class="block">
                <span class="data">Местоположение:</span>
            </span>
            <span>
                <?= Yii::$app->user->identity->address ?>
            </span>
            <?php if (Yii::$app->user->identity->description != NULL) { ?>
                <span class="block">
                    <span class="data">Краткое описание:</span>
                </span>
                <span>
                    <?= Yii::$app->user->identity->description ?>
                </span>
            <?php } ?>
        </div>
    </div>

    <div class="mt-4">
        <?php
            echo Html::a('Редактировать профиль', ['update', 'id' => Yii::$app->user->id], ['class' => 'btn btn-success']);    
        ?>
    </div>
</div>