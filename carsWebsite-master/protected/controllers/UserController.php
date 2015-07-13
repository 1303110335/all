<?php

class UserController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
                'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                        'actions'=>array('index','view','login','passwordupdate'),
                        'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('create','update','getuser','delete', 'customers', 'createcustomer'),
                        'roles'=>array('admin'),//表示只有角色为admin的用户才能访问
                ),

                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
                'user'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {

            $model->attributes=$_POST['User'];
            if($model->save())
                Yii::app ()->user->setFlash('addsuccess','添加成功');
            //				$this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
                'model'=>$model,
                'types'=>array('admin' => '网站管理员', 'operator'=>'接车员')
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {

            $model->attributes=$_POST['User'];
            if($model->save())
                Yii::app ()->user->setFlash('updatesuccess','修改成功');
            //				$this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
                'model'=>$model,
                'types'=>array('admin' => '网站管理员', 'operator'=>'接车员')
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(array('user/index'));
    }

    //user login
    public function actionLogin(){
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
                $this->redirect(Yii::app()->createUrl('site/index'));
        }
        // display the login form
        $this->renderPartial('login',array('model'=>$model));
    }

    public function actionPasswordUpdate(){
        $user=User::model()->findByPk(Yii::app()->user->id);
        $user->scenario = 'passwordupdate';
        if(isset($_POST['User']))
        {
            $user->attributes=$_POST['User'];
            if($user->save())
                Yii::app ()->user->setFlash('success','修改成功');
            //                           $this->redirect(array('site/index'));
        }
        $this->render('upaccount',array('user'=>$user));
    }

    public function actionIndex()
    {
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
            $model->attributes=$_GET['User'];

        $this->render('index',array(
                'user'=>$model,
                'hasType'=>true
        ));
    }

    /***************************************
     *
    *  Customer manager
    */

    public function actionCustomers()
    {
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
            $model->attributes=$_GET['User'];
         
        $model->type = 'customer';

        $this->render('index',array(
                'user'=>$model,
                'hasType'=>false,
        ));
    }

    public function actionCreateCustomer()
    {
        $model=new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {

            $model->attributes=$_POST['User'];
            if($model->save())
                Yii::app ()->user->setFlash('addsuccess','添加成功');
            //				$this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
                'model'=>$model,
                'types'=>array('customer'=>'车主')
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=User::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
     
     
}
