<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'form-signup-individual']); ?>
<?= $form->field($model, 'type', ['inputOptions' => ['id' => 'signupform-individual-type']])
    ->hiddenInput(['value' => '0'])
    ->label('');
?>
<?= $form->field($model, 'fio', ['inputOptions' => ['id' => 'signupform-individual-fio']])
    ->textInput(['autofocus' => true])
    ->label('ФИО');
?>
<?= $form->field($model, 'email', ['inputOptions' => ['id' => 'signupform-individual-email']]) ?>
    <p>Если вы являетесь ИП, то заполните ИНН:</p>
<?= $form->field($model, 'inn', ['inputOptions' => ['id' => 'signupform-individual-inn']])
    ->label('ИНН');
?>
<?= $form->field($model, 'password', ['inputOptions' => ['id'=>'signupform-individual-password']])
    ->passwordInput()
?>
    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
<?php ActiveForm::end(); ?>