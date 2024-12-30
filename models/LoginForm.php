<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'], // فیلدهای ضروری
            ['rememberMe', 'boolean'], // فیلد اختیاری برای ذخیره ورود
            ['password', 'validatePassword'], // اعتبارسنجی رمز عبور
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'نام کاربری یا رمز عبور اشتباه است.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0); // زمان ماندگاری ورود
        }
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username); // پیدا کردن کاربر بر اساس نام کاربری
        }
        return $this->_user;
    }
}

