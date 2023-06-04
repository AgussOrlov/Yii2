<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model{

    public $username;
    public $email;
    public $password;

public function rules()
{
    return[
        ['username', 'trim'],
        ['username', 'required'],
        ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este Nombre de Usuario ya esta Registrado.'],
        ['email', 'trim'],
        ['email', 'required'],
        ['email', 'email'],
        ['email', 'string', 'max' => 255],
        ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este Correo ya esta Registrado.'],
        ['password', 'required'],
        ['password', 'string', 'min' => 8],
    ];
}


public function signup()
{
    if (!$this->validate()) {
        return null;
    }

    $user = new User();
    $user-> username = $this->username;
    $user-> email = $this->email;
    $user-> setPassword($this->password);
    $user-> generateAuthKey();
    $user-> generateEmailVerificationToken();
    return $user-> save();
}



}




?>