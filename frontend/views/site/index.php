<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h1><?= $this->title ?> task</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h2>Task 1</h2>
                    <div class="well">
                        <p>Используя Yii2 необходимо реализовать форму регистрации пользователя с условием типа физ./юр.
                            лицо.</p>
                        <p>Для физ. лица необходимо заполнить: почту, ФИО и в случае ИП - ИНН, а для юр. лица: почту,
                            ФИО, название организации и инн.</p>
                        <p>Внешний вид значения не имеет.</p>
                    </div>
                    <h2>Solution</h2>
                    <p>Страница с формой регистрации:
                        <?= Html::a('Signup', Url::to(['/site/signup']), ['class' => "btn btn-xs btn-link"]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
