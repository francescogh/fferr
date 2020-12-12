<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\VenueIndexAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VenueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

VenueIndexAsset::register($this);

$this->title = 'Pubs & Cafès';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="venue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'city',
            'country',
            'address',
            //'postcode',
            //'venueCategory',
            //'websiteURL',
            //'mapURL',
            //'tel1',
            //'tel2',
            //'hasStudySpace',
            //'hasPoolTable',
            //'hasPingPong',
            //'hasLiveMusic',
            //'hasDanceHall',
            //'hasSportStreaming',
            //'about:ntext',
            //'layoutStyleId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
