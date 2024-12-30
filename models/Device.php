<?php

namespace app\models;

use yii\db\ActiveRecord;

class Device extends ActiveRecord
{
    public static function tableName()
    {
        return 'devices';
    }

    public function rules()
    {
        return [
            [['name', 'ip_address', 'device_type', 'status'], 'required'],
            ['ip_address', 'ip'],
            ['status', 'in', 'range' => ['Online', 'Offline']],
        ];
    }
}
