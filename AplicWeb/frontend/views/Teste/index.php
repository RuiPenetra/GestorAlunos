<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TesteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Testes';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="teste-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="box box-primary">
      <div class="box-body no-padding">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
      </div>
    </div>

</div>
<script type="text/javascript">
/* ADDING EVENTS */
 var currColor = '#3c8dbc' //Red by default
 //Color chooser button
 var colorChooser = $('#color-chooser-btn')
 $('#color-chooser > li > a').click(function (e) {
   e.preventDefault()
   //Save color
   currColor = $(this).css('color')
   //Add color effect to button
   $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
 })
 $('#add-new-event').click(function (e) {
   e.preventDefault()
   //Get value and make sure it is not null
   var val = $('#new-event').val()
   if (val.length == 0) {
     return
   }

   //Create events
   var event = $('<div />')
   event.css({
     'background-color': currColor,
     'border-color'    : currColor,
     'color'           : '#fff'
   }).addClass('external-event')
   event.html(val)
   $('#external-events').prepend(event)

   //Add draggable funtionality
   init_events(event)

   //Remove event from text input
   $('#new-event').val('')
 })
</script>
