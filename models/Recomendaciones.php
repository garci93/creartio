<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recomendaciones".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $publicacion_id
 * @property int $destinatario_id
 * @property string|null $texto
 *
 * @property Publicaciones $publicacion
 * @property Usuarios $usuario
 * @property Usuarios $destinatario
 */
class Recomendaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recomendaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'publicacion_id', 'destinatario_id'], 'required'],
            [['usuario_id', 'publicacion_id', 'destinatario_id'], 'default', 'value' => null],
            [['usuario_id', 'publicacion_id', 'destinatario_id'], 'integer'],
            [['texto'], 'string', 'max' => 255],
            [['publicacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publicaciones::className(), 'targetAttribute' => ['publicacion_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['destinatario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['destinatario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'publicacion_id' => 'Publicacion ID',
            'destinatario_id' => 'Destinatario ID',
            'texto' => 'Texto',
        ];
    }

    /**
     * Gets query for [[Publicacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublicacion()
    {
        return $this->hasOne(Publicaciones::className(), ['id' => 'publicacion_id'])->inverseOf('recomendaciones');
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id'])->inverseOf('recomendaciones');
    }

    /**
     * Gets query for [[Destinatario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestinatario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'destinatario_id'])->inverseOf('recomendaciones0');
    }
}
