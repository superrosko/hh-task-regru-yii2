<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'form-signup-entity']); ?>
<?= $form->field($model, 'type', ['inputOptions' => ['id' => 'signupform-entity-type']])
    ->hiddenInput(['value' => '1'])
    ->label('');
?>
<?= $form->field($model, 'fio', ['inputOptions' => ['id' => 'signupform-entity-fio']])
    ->textInput(['autofocus' => true])
    ->label('ФИО');
?>
<?= $form->field($model, 'email', ['inputOptions' => ['id' => 'signupform-entity-email']]) ?>
<?= $form->field($model, 'inn', ['inputOptions' => ['id' => 'signupform-entity-inn']])
    ->label('ИНН');
?>
<?= $form->field($model, 'organisation', ['inputOptions' => ['id' => 'signupform-entity-organisation']])
    ->label('Организация');
?>
<?= $form->field($model, 'password', ['inputOptions' => ['id' => 'signupform-entity-password']])
    ->passwordInput()
?>
    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
<?php ActiveForm::end(); ?>