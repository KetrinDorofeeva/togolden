<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\bootstrap4\ActiveForm;

    $this->title = $model->name;
    if (!Yii::$app->user->isGuest) {
        $this->params['breadcrumbs'][] = ['label' => 'Мои компании', 'url' => ['my']];
    }
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .alert-success.alert.alert-dismissible {
        margin-left: 0px;
    }
</style>

<br><div class="companies-view">
    <div id="accordion">
        <div class="card">
            <!--Название-->
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'name',
                                ],
                            ]);
                        ?>
                    </button>
                    
                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <span class="comment_chat" onmousedown = "viewNameCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->name_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->name_comment . "</span><br>";
                                }
                            }
                        ?>
                        
                        <!--Комментарии к названию компании-->
                        <div class="comments-form" id="add_name_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_nam_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'name_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--ИНН-->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'inn',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <span class="comment_chat" onmousedown = "viewAddInnCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->inn_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->inn_comment . "</span><br>";
                                }
                            } 
                        ?>

                        <!--Комментарии к ИНН компании-->
                        <div class="comments-form" id="add_inn_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_in_n_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'inn_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Общая информация-->
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'general_information',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <span class="comment_chat" onmousedown = "viewGenInfCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->general_information_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->general_information_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к общую информацию компании-->
                        <div class="comments-form" id="add_general_information_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_gen_inf_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'general_information_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Генеральный директор-->
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'general_manager',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <span class="comment_chat" onmousedown = "viewGenManCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseFour" class="collapse show" aria-labelledby="headingFour">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->general_manager_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->general_manager_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к генеральному директору компании-->
                        <div class="comments-form" id="add_general_manager_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_gen_man_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'general_manager_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Адрес-->
            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'address',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <span class="comment_chat" onmousedown = "viewAddressCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->address_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->address_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к адресу компании-->
                        <div class="comments-form" id="add_address_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_addr_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'address_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Телефон-->
            <div class="card-header" id="headingSix">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'phone',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <span class="comment_chat" onmousedown = "viewPhoneCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseSix" class="collapse show" aria-labelledby="headingSix">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->phone_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->phone_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к телефону компании-->
                        <div class="comments-form" id="add_phone_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_ph_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'phone_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><br>
        
        <!--Общие комментарии-->
        <?php if (!Yii::$app->user->isGuest) { ?>
            <span style="color: #FFC134; font-weight: bold; font-size: 25px">Общие комментарии</span>
            <span style="float: right; color: #eea90a; cursor: pointer" onmousedown = "viewGenCom()">Прокомментировать компанию <img style="width: 25px" src="/web/img/chat-fill.svg"></span>
    
            <?php foreach ($model_c as $comment) {
                if ($comment->general_comment !== NULL) {
                    echo "<div style='border-top: 1px solid #DFDFDF; margin-top: 25px'>";
                        echo "<br><span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                        "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                        "<span style='margin-left: 10px'>" . $comment->general_comment . "</span>";
                    echo "</div>";
                }
            } ?>

            <div class="comments-form" id="add_general_comment">
                <?php $form = ActiveForm::begin([
                    'id' => 'add_gen_comment',
                    'method' => 'post',
                ]);

                    echo $form->field($model_cr, 'general_comment')->textarea(['rows' => 6]);
                    echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                ActiveForm::end(); ?>
            </div>
        <?php } ?>
    </div>
</div>