<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venue".
 *
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string|null $country
 * @property string|null $address
 * @property string|null $postcode
 * @property string $venueCategory
 * @property string|null $websiteURL
 * @property string|null $mapURL
 * @property string|null $tel1
 * @property string|null $tel2
 * @property int|null $hasStudySpace
 * @property int|null $hasPoolTable
 * @property int|null $hasPingPong
 * @property int|null $hasLiveMusic
 * @property int|null $hasDanceHall
 * @property int|null $hasSportStreaming
 * @property string|null $about
 * @property int $layoutStyleId
 *
 * @property Image[] $images
 * @property LayoutStyle $layoutStyle
 * @property VenueVisit[] $venueVisits
 */
class Venue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city', 'venueCategory', 'layoutStyleId'], 'required'],
            [['hasStudySpace', 'hasPoolTable', 'hasPingPong', 'hasLiveMusic', 'hasDanceHall', 'hasSportStreaming', 'layoutStyleId'], 'integer'],
            [['about'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['city', 'country', 'postcode', 'venueCategory'], 'string', 'max' => 25],
            [['address'], 'string', 'max' => 100],
            [['websiteURL', 'mapURL'], 'string', 'max' => 250],
            [['tel1', 'tel2'], 'string', 'max' => 15],
            [['layoutStyleId'], 'exist', 'skipOnError' => true, 'targetClass' => LayoutStyle::className(), 'targetAttribute' => ['layoutStyleId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'city' => 'City',
            'country' => 'Country',
            'address' => 'Address',
            'postcode' => 'Postcode',
            'venueCategory' => 'Venue Category',
            'websiteURL' => 'Website Url',
            'mapURL' => 'Map Url',
            'tel1' => 'Tel1',
            'tel2' => 'Tel2',
            'hasStudySpace' => 'Has Study Space',
            'hasPoolTable' => 'Has Pool Table',
            'hasPingPong' => 'Has Ping Pong',
            'hasLiveMusic' => 'Has Live Music',
            'hasDanceHall' => 'Has Dance Hall',
            'hasSportStreaming' => 'Has Sport Streaming',
            'about' => 'About',
            'layoutStyleId' => 'Layout Style ID',
        ];
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['venueId' => 'id']);
    }

    /**
     * Gets query for [[LayoutStyle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLayoutStyle()
    {
        return $this->hasOne(LayoutStyle::className(), ['id' => 'layoutStyleId']);
    }

    /**
     * Gets query for [[VenueVisits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenueVisits()
    {
        return $this->hasMany(VenueVisit::className(), ['venueId' => 'id']);
    }
}
