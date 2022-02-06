<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contatti */

$this->title = 'Create Contatti';
$this->params['breadcrumbs'][] = ['label' => 'Contattis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contatti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
