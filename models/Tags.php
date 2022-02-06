<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $nome
 * @property int $contatto_id
 *
 * @property Contatti $contatto
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'contatto_id'], 'required'],
            [['nome'], 'string'],
            [['contatto_id'], 'integer'],
            [['contatto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contatti::className(), 'targetAttribute' => ['contatto_id' => 'contatti_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'contatto_id' => 'Contatto ID',
        ];
    }

    /**
     * Gets query for [[Contatto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContatto()
    {
        return $this->hasOne(Contatti::className(), ['contatti_id' => 'contatto_id']);
    }
}
