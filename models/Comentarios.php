<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property int $puntos
 * @property string $fortalezas
 * @property string $consejos
 * @property int|null $padre_id
 * @property string $created_at
 *
 * @property Comentarios $padre
 * @property Comentarios[] $comentarios
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['puntos', 'fortalezas', 'consejos'], 'required'],
            [['puntos', 'padre_id'], 'default', 'value' => null],
            [['puntos', 'padre_id'], 'integer'],
            [['created_at'], 'safe'],
            [['fortalezas', 'consejos'], 'string', 'max' => 255],
            [['padre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comentarios::className(), 'targetAttribute' => ['padre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'puntos' => 'Puntos',
            'fortalezas' => 'Fortalezas',
            'consejos' => 'Consejos',
            'padre_id' => 'Padre ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Padre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPadre()
    {
        return $this->hasOne(Comentarios::className(), ['id' => 'padre_id'])->inverseOf('comentarios');
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['padre_id' => 'id'])->inverseOf('padre');
    }
}
