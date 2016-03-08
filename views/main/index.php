
<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/calendar.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


$this->title = $agenda->nombre;


echo Html::hiddenInput('tipo', $tipo);
echo Html::hiddenInput('id', $id);

?>

<div class="site-index">

    <div class="body-content">
        
        <div id='loading' class='Center-Horizontal no-visible'>
            <?php echo Html::img(Yii::$app->request->baseUrl . '/image/loading.gif') ?>                
        </div>
        
        <div id='calendar'>                           
        </div>

        <div id="dialog" title="Creación Evento" style="display :none">
            Nombre: <input type="text" id="name" value="" /><br />
            Inicio: <text  id="initDate" >hora inicio</text><br />
            Duración (minutos): <input type="number" id="duration" value="30" />        
        </div>

    </div>
</div>

