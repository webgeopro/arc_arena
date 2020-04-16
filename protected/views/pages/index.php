<?php
$this->breadcrumbs=array(
	'Страницы',
);

$this->menu=array(
	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Страницы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
