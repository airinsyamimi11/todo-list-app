<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4])->label('Notes (optional)') ?>

    <?= $form->field($model, 'is_done')->checkbox()->label('Mark as done') ?>

    <div class="todo-form-actions">
        <?= Html::submitButton('Save task', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-link']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>