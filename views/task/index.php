<?php

use app\models\Task;
use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My tasks';
$this->params['breadcrumbs'][] = $this->title;

// Open tasks first, newest on top
$dataProvider->sort->defaultOrder = ['is_done' => SORT_ASC, 'created_at' => SORT_DESC];
$dataProvider->pagination->pageSize = 20;

$openCount = (int) Task::find()->where(['is_done' => 0])->count();
$doneCount = (int) Task::find()->where(['is_done' => 1])->count();

$current = Yii::$app->request->get('TaskSearch')['is_done'] ?? '';
$tabs = [
    ['label' => 'All', 'value' => '', 'count' => $openCount + $doneCount],
    ['label' => 'To do', 'value' => '0', 'count' => $openCount],
    ['label' => 'Done', 'value' => '1', 'count' => $doneCount],
];
?>
<div class="todo">

    <header class="todo-head">
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="todo-sub">
            <?= $openCount === 0
                ? 'All caught up.'
                : $openCount . ($openCount === 1 ? ' task' : ' tasks') . ' left to do.' ?>
        </p>
    </header>

    <?= Html::beginForm(['create'], 'post', ['class' => 'todo-add']) ?>
        <input type="text" name="Task[title]" maxlength="255" required
               placeholder="What do you need to do?" aria-label="New task title">
        <?= Html::submitButton('Add task', ['class' => 'btn btn-primary']) ?>
    <?= Html::endForm() ?>

    <nav class="todo-tabs" aria-label="Filter tasks">
        <?php foreach ($tabs as $tab): ?>
            <?= Html::a(
                Html::encode($tab['label']) . ' <span>' . $tab['count'] . '</span>',
                $tab['value'] === '' ? ['index'] : ['index', 'TaskSearch[is_done]' => $tab['value']],
                ['class' => 'todo-tab' . ((string) $current === $tab['value'] ? ' is-active' : '')]
            ) ?>
        <?php endforeach ?>
    </nav>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}\n<div class=\"todo-pager\">{pager}</div>",
        'options' => ['class' => 'todo-list'],
        'itemOptions' => ['tag' => false],
        'emptyText' => 'Nothing here yet. Type a task above and press Add task.',
        'emptyTextOptions' => ['class' => 'todo-empty'],
    ]) ?>

</div>