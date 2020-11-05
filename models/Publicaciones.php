<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publicaciones".
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $descripcion
 * @property int $usuario_id
 *
 * @property Archivos[] $archivos
 * @property ColeccionesPublicaciones[] $coleccionesPublicaciones
 * @property GaleriasPublicaciones[] $galeriasPublicaciones
 * @property Usuarios $usuario
 * @property Recomendaciones[] $recomendaciones
 */
class Publicaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publicaciones';
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
            [['descripcion'], 'string', 'max' => 500],
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
            'descripcion' => 'Descripcion',
            'usuario_id' => 'Usuario ID',
        ];
    }

    /**
     * Gets query for [[Archivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArchivos()
    {
        return $this->hasMany(Archivos::className(), ['publicacion_id' => 'id'])->inverseOf('publicacion');
    }

    /**
     * Gets query for [[ColeccionesPublicaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColeccionesPublicaciones()
    {
        return $this->hasMany(ColeccionesPublicaciones::className(), ['publicacion_id' => 'id'])->inverseOf('publicacion');
    }

    /**
     * Gets query for [[GaleriasPublicaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGaleriasPublicaciones()
    {
        return $this->hasMany(GaleriasPublicaciones::className(), ['publicacion_id' => 'id'])->inverseOf('publicacion');
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id'])->inverseOf('publicaciones');
    }

    /**
     * Gets query for [[Recomendaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecomendaciones()
    {
        return $this->hasMany(Recomendaciones::className(), ['publicacion_id' => 'id'])->inverseOf('publicacion');
    }
}
