<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contatti".
 *
 * @property int $contatti_id
 * @property string $nome
 * @property string $cognome
 * @property string $numero
 * 
 * @property Tags[] $tag
 */
class Contatti extends \yii\db\ActiveRecord
{
    public $tags;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contatti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cognome', 'numero'], 'required'],
            [['nome', 'cognome'], 'string', 'max' => 30],
            [['numero'], 'string', 'max' => 128],
            [['tags'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contatti_id' => 'ID',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'numero' => 'Numero',
            'tags' => 'Tag',
        ];
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasMany(Tags::className(), ['contatto_id' => 'contatti_id']);
    }
}
