<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property int $id
 * @property int $cedula
 * @property string $nombre
 * @property string $apellido
 * @property int $id_parroquia
 * @property string $fecha
 *
 * @property Parroquia $parroquia
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'apellido', 'id_parroquia'], 'required'],
            [['cedula', 'id_parroquia'], 'default', 'value' => null],
            [['cedula', 'id_parroquia'], 'integer'],
            [['fecha'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['cedula'], 'unique'],
            [['id_parroquia'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['id_parroquia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'id_parroquia' => 'Id Parroquia',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquia()
    {
        return $this->hasOne(Parroquia::className(), ['id' => 'id_parroquia']);
    }
}
