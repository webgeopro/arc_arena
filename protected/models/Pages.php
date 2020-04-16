<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $label
 * @property string $comment
 * @property integer $sort
 * @property integer $visible
 * @property string $content
 */
class Pages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, sort, visible', 'numerical', 'integerOnly'=>true),
			array('name, label', 'length', 'max'=>40),
			array('comment', 'length', 'max'=>255),
			//array('pic', 'length', 'max'=>30),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, name, label, comment, sort, visible, content', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '№',
			'parent_id' => 'Корневой узел',
			'name' => 'Имя',
			'label' => 'Метка',
			'comment' => 'Комментарий',
			//'pic' => 'Изображение',
			'sort' => 'Сортировка',
			'visible' => 'Видимость',
			'content' => 'Содержание',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('parent_id',$this->parent_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('label',$this->label,true);

		$criteria->compare('comment',$this->comment,true);

		//$criteria->compare('pic',$this->pic,true);

		$criteria->compare('sort',$this->sort);

		$criteria->compare('visible',$this->visible);

		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider('pages', array(
			'criteria'=>$criteria,
		));
	}
    /**
	 * Получение иерархического списка меню 
	 * @return array
	 */
	public function getMenu()
	{
		/*$req = Yii::app()->db->createCommand(
            "SELECT m1.id,m1.label, m1.name, m1.pic, m2.id IS NOT NULL AS hasChildren "
            . "FROM pages AS m1 LEFT JOIN pages AS m2 ON m1.id=m2.parent_id "
            . "WHERE m1.parent_id = 0 AND m1.name != 'main' "
            . "GROUP BY m1.id ORDER BY m1.label ASC"
        );
        $children = $req->queryAll();
        $res = str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
           CTreeView::saveDataAsJson($children)
        );*/

        //return $children;

        return $this->model()->findAllByAttributes(array('parent_id' => 0, 'visible' => 1, ));
	}
    
    public function getSubMenu($parentID=0)
	{
		/*$req = Yii::app()->db->createCommand(
            "SELECT id, label, name "
            . "FROM pages "
            . "WHERE parent_id = $parentID "
            . "ORDER BY id ASC"
        );
        $children = $req->queryAll();
        
        return $children; #return $res; #$res = CTreeView::saveDataAsJson($children);*/

        return $this->model()->findAllByAttributes(array('parent_id' => $parentID, 'visible' => 1,));
	}
}