<?php

namespace common\models;

use Yii;

/**
 * 股票列表
 *
 * @property string $code
 * @property string $name
 * @property string $industry
 * @property string $area
 * @property double $pe
 * @property double $outstanding
 * @property double $totals
 * @property double $totalAssets
 * @property double $liquidAssets
 * @property double $fixedAssets
 * @property double $reserved
 * @property double $reservedPerShare
 * @property double $esp
 * @property double $bvps
 * @property double $pb
 * @property int $timeToMarket
 * @property double $undp
 * @property double $perundp
 * @property double $rev
 * @property double $profit
 * @property double $gpr
 * @property double $npr
 * @property double $holders
 */
class StockBasics extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_basics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pe', 'outstanding', 'totals', 'totalAssets', 'liquidAssets', 'fixedAssets', 'reserved', 'reservedPerShare', 'esp', 'bvps', 'pb', 'undp', 'perundp', 'rev', 'profit', 'gpr', 'npr', 'holders'], 'number'],
            [['timeToMarket'], 'integer'],
            [['code', 'name', 'industry', 'area'], 'string', 'max' => 100],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'industry' => 'Industry',
            'area' => 'Area',
            'pe' => 'Pe',
            'outstanding' => 'Outstanding',
            'totals' => 'Totals',
            'totalAssets' => 'Total Assets',
            'liquidAssets' => 'Liquid Assets',
            'fixedAssets' => 'Fixed Assets',
            'reserved' => 'Reserved',
            'reservedPerShare' => 'Reserved Per Share',
            'esp' => 'Esp',
            'bvps' => 'Bvps',
            'pb' => 'Pb',
            'timeToMarket' => 'Time To Market',
            'undp' => 'Undp',
            'perundp' => 'Perundp',
            'rev' => 'Rev',
            'profit' => 'Profit',
            'gpr' => 'Gpr',
            'npr' => 'Npr',
            'holders' => 'Holders',
        ];
    }
}
