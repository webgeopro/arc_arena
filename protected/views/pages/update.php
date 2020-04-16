<?php
$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить страницу',
);

$this->menu=array(
    array('label'=>'Список страниц', 'url'=>array('index')),
	array('label'=>'Новая страница', 'url'=>array('create')),
	array('label'=>'Просмотр страницы', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Изменить страницу "<?=$model->name?>" (№<?=$model->id?>)</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>