<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reportes".
 *
 * @property int $id
 * @property int $reportador_id
 * @property int $reportado_id
 * @property string $razon
 * @property string $created_at
 *
 * @property Usuarios $reportador
 * @property Usuarios $reportado
 */
class Reportes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reportes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reportador_id', 'reportado_id', 'razon'], 'required'],
            [['reportador_id', 'reportado_id'], 'default', 'value' => null],
            [['reportador_id', 'reportado_id'], 'integer'],
            [['created_at'], 'safe'],
            [['razon'], 'string', 'max' => 255],
            [['reportador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['reportador_id' => 'id']],
            [['reportado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['reportado_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reportador_id' => 'Reportador ID',
            'reportado_id' => 'Reportado ID',
            'razon' => 'Razon',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Reportador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReportador()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'reportador_id'])->inverseOf('reportes');
    }

    /**
     * Gets query for [[Reportado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReportado()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'reportado_id'])->inverseOf('reportes0');
    }
}
