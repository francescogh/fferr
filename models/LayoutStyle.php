<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "layout_style".
 *
 * @property int $id
 * @property string|null $label
 * @property string|null $bgPatternType
 * @property string|null $bgColor1
 * @property string|null $bgColor2
 * @property string|null $borderColor
 *
 * @property Venue[] $venues
 */
class LayoutStyle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'layout_style';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label', 'bgPatternType'], 'string', 'max' => 25],
            [['bgColor1', 'bgColor2', 'borderColor'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'bgPatternType' => 'Bg Pattern Type',
            'bgColor1' => 'Bg Color1',
            'bgColor2' => 'Bg Color2',
            'borderColor' => 'Border Color',
        ];
    }

    /**
     * Gets query for [[Venues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenues()
    {
        return $this->hasMany(Venue::className(), ['layoutStyleId' => 'id']);
    }
}
