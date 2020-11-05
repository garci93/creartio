<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avatares".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $archivo_id
 *
 * @property Archivos $archivo
 * @property Usuarios $usuario
 */
class Avatares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avatares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'archivo_id'], 'required'],
            [['usuario_id', 'archivo_id'], 'default', 'value' => null],
            [['usuario_id', 'archivo_id'], 'integer'],
            [['archivo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Archivos::className(), 'targetAttribute' => ['archivo_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
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
            'archivo_id' => 'Archivo ID',
        ];
    }

    /**
     * Gets query for [[Archivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArchivo()
    {
        return $this->hasOne(Archivos::className(), ['id' => 'archivo_id'])->inverseOf('avatares');
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id'])->inverseOf('avatares');
    }
}
