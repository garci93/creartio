<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colecciones".
 *
 * @property int $id
 * @property string $titulo
 * @property bool $por_defecto
 * @property int $usuario_id
 *
 * @property Usuarios $usuario
 */
class Colecciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colecciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'por_defecto', 'usuario_id'], 'required'],
            [['por_defecto'], 'boolean'],
            [['usuario_id'], 'default', 'value' => null],
            [['usuario_id'], 'integer'],
            [['titulo'], 'string', 'max' => 40],
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
            'titulo' => 'Titulo',
            'por_defecto' => 'Por Defecto',
            'usuario_id' => 'Usuario ID',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id'])->inverseOf('colecciones');
    }
}
