<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galerias".
 *
 * @property int $id
 * @property string $titulo
 * @property int $usuario_id
 *
 * @property ColeccionesPublicaciones[] $coleccionesPublicaciones
 * @property Usuarios $usuario
 * @property GaleriasPublicaciones[] $galeriasPublicaciones
 */
class Galerias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galerias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'usuario_id'], 'required'],
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
            'usuario_id' => 'Usuario ID',
        ];
    }

    /**
     * Gets query for [[ColeccionesPublicaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColeccionesPublicaciones()
    {
        return $this->hasMany(ColeccionesPublicaciones::className(), ['galeria_id' => 'id'])->inverseOf('galeria');
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id'])->inverseOf('galerias');
    }

    /**
     * Gets query for [[GaleriasPublicaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleriasPublicaciones()
    {
        return $this->hasMany(GaleriasPublicaciones::className(), ['galeria_id' => 'id'])->inverseOf('galeria');
    }
}
