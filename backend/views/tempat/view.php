<?php


use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Validasi;

//google maps
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use yii2mod\google\maps\markers;

/* @var $this yii\web\View */
/* @var $model backend\models\Tempat */
$coord = new LatLng(['lat' => $model->mlat, 'lng' => $model->mlong]);

$map = new Map([
		'center' => $coord,
		'zoom' => 14,
]);
$marker = new Marker([
		'position' => $coord,
		'title' => $model->deskripsi,
]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
		new InfoWindow([
				'content' => $model->id
		])
		);

// Add marker to the map
$map->addOverlay($marker);

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tempats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHpQseAswmtTuLtpzszIPlhqnCcqd0VKU&callback=initMap" async defer></script>

<div class="tempat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_tempat',
            'mlat',
            'mlong',
            'gambar',
            [

        		'attribute'=>'Peta',
        		'value'=>$model->mlat==''?'':$map->display(),
        		'format' => 'raw',
        	],
					
            'deskripsi:ntext',
        ],
    ]) ?>

</div>
