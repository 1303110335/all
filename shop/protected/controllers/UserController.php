<?php
/**
 * 用户控制器
 * 13-5-7 下午8:30 
 */
class UserController extends Controller{
    
    /*用户验证码生成
     * 一下代码的意思，在当前控制器里面，以方法的形式访问
     * 我们访问./index.php?r=user/captcha就会访问到以方法的CCaptchaAction
     * 会走里面的run方法
     * 谁回来使用user/captcha这个路由
     * 答：是视图表单简介过来调用($this->widget('CCaptcha'))
     * */ 
    function actions(){
        return array(
          'captcha'=>array(
              'class'=>'system.web.widgets.captcha.CCaptchaAction',
              'width'=>75,
              'height'=>30,
              'minLength'=>4,
              'maxLength'=>4,
          ),  
        );
    }
    
    /**
     *用户登录 
     */
    function actionLogin(){
        $user_login = new LoginForm;
        
        if(isset($_POST['LoginForm'])){
            $user_login -> attributes = $_POST['LoginForm'];
            //校验方法走的是rules()方法
            //不仅校验用户名和密码是否填写，还要校验密码的真实性
            
            //login()对用户信息进行session存储
            if($user_login ->validate() && $user_login->login()){
                   $this->redirect('./index.php');
            }
        }
 
        $this -> render('login',array('user_login'=>$user_login));
    }
    
    /*
	 *实现用户注册功能
	 * 1.展现注册表单
	 * 2.收集，校验，存储数据
 	 */
    function actionRegister(){
    	//实例化数据模型对象user
    	$user_model = new User();
    	
    	//定义性别信息
    	$sex[1]="男";
    	$sex[2]="女";
    	$sex[3]="保密";
    	
    	//定义学历
    	$xueli[1]="请选择学历";
    	$xueli[2]="小学";
    	$xueli[3]="初中";
    	$xueli[4]="高中";
    	$xueli[5]="大学";
    	
    	//定义爱好
    	$hobby[1]="篮球";
    	$hobby[2]="足球";
    	$hobby[3]="棒球";
    	$hobby[4]="橄榄球";
    	
    	//如果用户有注册表单
    	if(isset($_POST['User'])){
    		//搜集爱好的信息
    		if(is_array($_POST['User']['user_hobby'])){
    			$_POST['User']['user_hobby'] = implode(',',$_POST['User']['user_hobby']);
    		}

			/*foreach($_POST['User'] as $k => $v){
    			$user_model->$k = $v;
    		}*/
    		
    		$_POST['User']['password'] = md5($_POST['User']['password']);
    		$_POST['User']['password2'] = md5($_POST['User']['password2']);
    		//上边的foreach在yii框架中有优化，使用模型属性attributes来进行优化
    		$user_model -> attributes = $_POST['User'];
    		
    		if($user_model->save()){
    			$this->redirect('./index.php');//重定向到首页
    		}
    	}
    	
        /**
         * renderPartial不渲染布局
         * render会渲染布局 
         */
        //$this ->renderPartial('register');
        $this -> render('register',array('user_model'=>$user_model,'sex'=>$sex,'xueli'=>$xueli,'hobby'=>$hobby));
    }
    
    
    /*用户推出系统*/
    function actionLogout(){
        //删除session信息
        Yii::app()->session->clear();//删除内存中的session变量信息
        Yii::app()->session->destroy();//删除服务器中的session文件
        $this->redirect('/shop/');
        
    }
    
    /*
     * session使用
     * */
    function actionS1(){
        Yii::app()->session['username']="张三";
        Yii::app()->session['useraddr']="北京";
    }
    
    //使用session
    function actionS2(){
        echo Yii::app()->session['username'];
        echo "<br/>";
        echo Yii::app()->session['useraddr'];
        echo "<br/>";
        echo "use session success";
    }
    
    //删除session
    function actionS3(){
        //删除某一个
        //unset(Yii::app()->session['useraddr']);
        //删除全部
        Yii::app()->session->clear();
        Yii::app()->session->destroy();
    }
    
    /*
     * cookie在Yii中的使用
     * */
    function actionC1(){
        //设置cookie
        $ck = new CHttpCookie('hobby','篮球,足球');
        $ck -> expire = time()+3600;
        //吧cookie对象放入cookie组件中
        Yii::app()->request->cookies['hobby'] = $ck;
        
        $ck2 = new CHttpCookie('sex','男');
        $ck2 -> expire = time()+3600;
        //吧cookie对象放入cookie组件中
        Yii::app()->request->cookies['sex'] = $ck2;
        
        echo "cookie make success";
    }
    
    //访问cookie
    function actionC2(){
        echo Yii::app()->request->cookies['hobby'];
        echo Yii::app()->request->cookies['sex'];
    }
    
    //删除cookie
    function actionC3(){
        unset(Yii::app()->request->cookies['sex']);
    }
    
    function actionLu(){
        //输出路径别名信息/yii就是框架直接可以操作使用的类
        //Yii::app() 是一个实例
        //echo Yii::getPathOfAlias('system');//framework
        //echo Yii::getPathOfAlias('application');//protected
        //echo Yii::getPathOfAlias('zii');//E:\all\framework\zii
        
    }
    
}
