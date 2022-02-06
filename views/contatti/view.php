<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contatti */

$this->title = $model->contatti_id;
$this->params['breadcrumbs'][] = ['label' => 'Contattis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contatti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'contatti_id' => $model->contatti_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'contatti_id' => $model->contatti_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'contatti_id',
            'nome',
            'cognome',
            'numero',
        ],
    ]) ?>

</div>
