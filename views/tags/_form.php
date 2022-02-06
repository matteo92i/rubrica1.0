<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Contatti;
use yii\helpers\ArrayHelper;

$contatti = ArrayHelper::map(Contatti::find()->all(), 'contatti_id', 'cognome');
/* @var $this yii\web\View */
/* @var $model app\models\Tags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput() ?>

    <?= $form->field($model, 'contatto_id')->dropdownlist($contatti) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
