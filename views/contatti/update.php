<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contatti */

$this->title = 'Update Contatti: ' . $model->contatti_id;
$this->params['breadcrumbs'][] = ['label' => 'Contattis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contatti_id, 'url' => ['view', 'contatti_id' => $model->contatti_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contatti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
