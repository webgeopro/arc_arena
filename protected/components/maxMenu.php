<?php
/**
 * Виджет "Меню".
 * Работа с меню сайта.
 * 
 */

class maxMenu extends CWidget {
	
    public $pageID; # ID страницы
    public $pageLabel; # ID страницы
    public $innerMenu = false; # Отображение подменю на внутренних мтраницах
    
    public function run() {
		$cs = Yii::app()->clientScript;
        $cs->registerCSSFile(Yii::app()->baseUrl.'/css/maxMenu.css');
        if ( !$cs->isScriptFileRegistered(Yii::app()->baseUrl.'/js/maxMenu.js', CClientScript::POS_HEAD) )
            $cs->registerScriptFile(Yii::app()->baseUrl.'/js/maxMenu.js', CClientScript::POS_HEAD);
        
        
        if ($this->pageID) { // Указана страница
            if ($this->innerMenu) { // Отобразить подменю
                $menu = Pages::model()->getSubMenu($this->pageID);
            } else { // Отобразить главное меню
                $menu = Pages::model()->getMenu(); // Передать $this->pageID для подсветки
            }
        } else {
            $menu = Pages::model()->getMenu();
        }
        $this->render('maxMenu', array(
            'menu'      => $menu,
            'pageID'    => $this->pageID,
            'innerMenu' => $this->innerMenu,
            'pageLabel' => $this->pageLabel,
        ));
	}
}