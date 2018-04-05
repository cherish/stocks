<?php
namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Model extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_LOCK = 1;
    const STATUS_ACTIVE = 2;
    

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
