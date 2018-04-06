<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tick_data".
 *
 * @property int $index
 * @property string $date
 * @property double $open
 * @property double $close
 * @property double $high
 * @property double $low
 * @property double $volume
 * @property string $code
 */
class TickData extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tick_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index'], 'integer'],
            [['date', 'code'], 'string'],
            [['open', 'close', 'high', 'low', 'volume'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'index' => 'Index',
            'date' => 'Date',
            'open' => 'Open',
            'close' => 'Close',
            'high' => 'High',
            'low' => 'Low',
            'volume' => 'Volume',
            'code' => 'Code',
        ];
    }
    
    public function getBasic() {
        return $this->hasOne(StockBasics::className(), ['code'=>'code']);
    }
}
