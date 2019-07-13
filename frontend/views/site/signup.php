<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use frontend\models\SignupForm;

/* @var $model SignupForm */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php
            try {
                echo Tabs::widget([
                    'items' => [
                        [
                            'label' => 'Физ. лицо',
                            'content' => $this->render('forms/signup_individual', ['model' => $model]),
                            'active' => true
                        ],
                        [
                            'label' => 'Юр. лицо',
                            'content' => $this->render('forms/signup_entity', ['model' => $model]),
                        ]
                    ]
                ]);
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
            ?>
        </div>
    </div>
</div>
