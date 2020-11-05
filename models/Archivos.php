<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $extension
 * @property int $publicacion_id
 *
 * @property Publicaciones $publicacion
 * @property Avatares[] $avatares
 */
class Archivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'extension', 'publicacion_id'], 'required'],
            [['publicacion_id'], 'default', 'value' => null],
            [['publicacion_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['extension'], 'string', 'max' => 10],
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
            'nombre' => 'Nombre',
            'extension' => 'Extension',
            'publicacion_id' => 'Publicacion ID',
        ];
    }

    /**
     * Gets query for [[Publicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacion()
    {
        return $this->hasOne(Publicaciones::className(), ['id' => 'publicacion_id'])->inverseOf('archivos');
    }

    /**
     * Gets query for [[Avatares]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvatares()
    {
        return $this->hasMany(Avatares::className(), ['archivo_id' => 'id'])->inverseOf('archivo');
    }
}
