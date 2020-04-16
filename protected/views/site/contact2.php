<!--<script src="http://api-maps.yandex.ru/2.0/index.xml?key=ACDWtE8BAAAAPa58VAIAkNknDX9Awm-k8CiQMNq_hbIt6bUAAAAAAAAAAABIh1Y8yYB6KSSorNrqlJhgVX8x7w==" type="text/javascript"></script>
<script src="http://api-maps.yandex.ru/1.1/index.xml?key=ACDWtE8BAAAAPa58VAIAkNknDX9Awm-k8CiQMNq_hbIt6bUAAAAAAAAAAABIh1Y8yYB6KSSorNrqlJhgVX8x7w==" type="text/javascript"></script>
<script src="http://api-maps.yandex.ru/2.0/?lang=ru-RU&load=map&ns=myNamespace" type="text/javascript"></script>
-->
<script src="http://api-maps.yandex.ru/2.0/?load=package.full&mode=debug&lang=ru-RU" type="text/javascript"></script>
<script type="text/javascript">

    var myMap = new ymaps.Map("YMapsID", {
        // Центр карты
        center: [92.910409, 56.046615],
        // Коэффициент масштабирования
        zoom: 14
        // Тип карты
        //type: "yandex#satellite"
    });
    // Создание метки
    var myPlacemark = new ymaps.Placemark(
        // Координаты метки
        [92.894359, 56.050434], {
            /* Свойства метки:
               - контент значка метки */
            iconContent: "АРЕНА.СЕВЕР",
            // - контент балуна метки
            balloonContent: "улица 9 Мая, 74"
        }, {
            /* Опции метки:
               - флаг перетаскивания метки */
            draggable: false,
            /* - показывать значок метки
               при открытии балуна */
            hideIconOnBallon: false
        }
    );

    // Добавление метки на карту
    myMap.geoObjects.add(myPlacemark);
</script>
<table><tr><td style="vertical-align:top;">
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
    'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
        'hideErrorMessage' => true,
	),
)); ?>

	<p class="note">Поля, помеченные <span class="required">*</span>, обязательны к заполнению.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?#php echo $form->error($model,'name'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone'); ?>
		<?#php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?#php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?#php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?#php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Введите текст, указанный на картинке.</div>
		<?#php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<?php endif; ?>
</td><td style="vertical-align:top;width:50%;">
<div id="YMapsID"></div>
</td></tr></table>