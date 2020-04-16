<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'event'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$cs = Yii::app()->clientScript;
        $page = trim($_GET['page']);

        if ('events' == $page){ // Отдельно для разбора xml-файла
            $cs->registerScriptFile('/js/events.js', CClientScript::POS_HEAD);
            $this->pageTitle = 'АРЕНА.СЕВЕР :: АФИША';
            $content['id'] = 6;
		    $this->render('events',array('page'=>$content, 'base'=>Yii::app()->basePath.'\..', ));
        } elseif ($page and Pages::model()->exists('label=:labelID', array(':labelID'=>$page))) {
            $cs->registerCSSFile('/css/second.css');
            //$this->layout = '//layouts/main';
            $page = Pages::model()->findByAttributes(array('label'=>$page));
            $this->pageTitle = 'АРЕНА.СЕВЕР :: '.$page['name'];
            $this->render('page', array(
                'page' => $page,
            ));
        } else {
            $cs->registerScriptFile('/js/index.js', CClientScript::POS_HEAD);
            $this->pageTitle = 'АРЕНА.СЕВЕР :: Красноярск';
            $this->render('index', array());
        }
	}
    public function actionGetPage()
	{   $pageLabel = $_POST['pageLabel'];
	    if ($pageLabel) {
            $content = Pages::model()->findByAttributes(array('label'=>$pageLabel));
        } else {
            $content['content'] = '';
        }
        die( $content['content'] );
	}
    /**
    * Отображение страницы события афиши
    */
    public function actionGetEvent()
	{   $pageLabel = $_POST['pageLabel'];
	    if ($pageLabel) {
            $content = Event::model()->findByAttributes(array('label'=>$pageLabel));
        } else {
            $content['content'] = '';
        }
        die( $content['content'] );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile('/js/contact.js', CClientScript::POS_HEAD);
        $cs->registerCSSFile('/css/contact.css');
        
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('/pages/index');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}