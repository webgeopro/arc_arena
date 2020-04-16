<?php
$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	'Создать страницу',
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Создать страницу</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>