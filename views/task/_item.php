<?php

use yii\helpers\Html;

/** @var app\models\Task $model */

$done = (bool) $model->is_done;
?>
<article class="task<?= $done ? ' is-done' : '' ?>">

    <?= Html::a('', ['toggle', 'id' => $model->id], [
        'class' => 'task-check',
        'data-method' => 'post',
        'title' => $done ? 'Mark as not done' : 'Mark as done',
        'aria-label' => $done ? 'Mark as not done' : 'Mark as done',
    ]) ?>

    <div class="task-body">
        <h2 class="task-title"><?= Html::encode($model->title) ?></h2>
        <?php if (!empty($model->description)): ?>
            <p class="task-desc"><?= nl2br(Html::encode($model->description)) ?></p>
        <?php endif ?>
        <p class="task-meta">Added <?= Yii::$app->formatter->asDate($model->created_at, 'php:d M Y') ?></p>
    </div>

    <div class="task-actions">
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-outline-danger',
            'data' => ['confirm' => 'Delete this task?', 'method' => 'post'],
        ]) ?>
    </div>

</article>