<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trabajos".
 *
 * @property int $idtrabajos
 * @property string $fechaI
 * @property string $fechaF
 * @property string $descripcion
 */
class Trabajos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trabajos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaI', 'fechaF', 'descripcion'], 'required'],
            [['fechaI', 'fechaF'], 'safe'],
            [['descripcion'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtrabajos' => 'Idtrabajos',
            'fechaI' => 'Fecha I',
            'fechaF' => 'Fecha F',
            'descripcion' => 'Descripcion',
        ];
    }
}
