<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galerias_publicaciones".
 *
 * @property int $id
 * @property int $galeria_id
 * @property int $publicacion_id
 *
 * @property Galerias $galeria
 * @property Publicaciones $publicacion
 */
class GaleriasPublicaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galerias_publicaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['galeria_id', 'publicacion_id'], 'required'],
            [['galeria_id', 'publicacion_id'], 'default', 'value' => null],
            [['galeria_id', 'publicacion_id'], 'integer'],
            [['galeria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Galerias::className(), 'targetAttribute' => ['galeria_id' => 'id']],
            [['publicacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publicaciones::className(), 'targetAttribute' => ['publicacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'galeria_id' => 'Galeria ID',
            'publicacion_id' => 'Publicacion ID',
        ];
    }

    /**
     * Gets query for [[Galeria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleria()
    {
        return $this->hasOne(Galerias::className(), ['id' => 'galeria_id'])->inverseOf('galeriasPublicaciones');
    }

    /**
     * Gets query for [[Publicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacion()
    {
        return $this->hasOne(Publicaciones::className(), ['id' => 'publicacion_id'])->inverseOf('galeriasPublicaciones');
    }
}
