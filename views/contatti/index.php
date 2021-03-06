<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContattiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contattis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contatti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contatti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contatti_id',
            'nome',
            'cognome',
            'numero',
            [
                'label' => 'Tag',
                'value' => function ($model){
                    $return = '';
                    if(!is_null($model->tag)) {
                        foreach ($model->tag as $tag){
                            $return .= $tag->nome.', ';
                        }
                    }
                    return $return;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'contatti_id' => $model->contatti_id]);
                 }
            ],
        ],
    ]); ?>


</div>
