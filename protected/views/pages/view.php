<?php
$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Новая страница', 'url'=>array('create')),
	array('label'=>'Изменить страницу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить страницу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Действительно удалить?')),
	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Просмотр страницы "<?=$model->name?>" (№<?=$model->id?>)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'name',
		'label',
		'comment',
		'sort',
		'visible',
		'content',
	),
)); ?>
