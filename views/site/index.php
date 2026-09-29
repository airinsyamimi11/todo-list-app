<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'To-Do List Manager';
?>
<div class="welcome">
    <div class="welcome-emoji" aria-hidden="true">📝</div>

    <h1>To-Do List Manager</h1>

    <p class="welcome-text">
        Keep track of your assignments, meetings and everyday errands in one place.
        Add a task, tick it off when it's done, and always know what's left.
    </p>

    <?= Html::a('Go to my tasks', ['/task/index'], ['class' => 'btn btn-primary btn-lg welcome-btn']) ?>
</div>