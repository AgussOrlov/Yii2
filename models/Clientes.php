<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $idCli
 * @property int $telefono
 * @property string $email
 * @property string $domicilio
 * @property string $razon
 * @property string $logo
 * @property string $fechaAlta
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telefono', 'email', 'domicilio', 'razon', 'logo', 'fechaAlta'], 'required'],
            [['telefono'], 'integer'],
            [['fechaAlta'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['domicilio', 'razon'], 'string', 'max' => 400],
            [['logo'], 'string', 'max' => 3000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCli' => 'Id Cli',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'domicilio' => 'Domicilio',
            'razon' => 'Razon',
            'logo' => 'Logo',
            'fechaAlta' => 'Fecha Alta',
        ];
    }
}
