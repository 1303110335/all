<?php
/**
 * 用户控制器
 * 13-5-7 下午8:30 
 */
class UserController extends Controller{
    /**
     *用户登录 
     */
    function actionLogin(){
        $user_login = new LoginForm;
        
        if(isset($_POST['LoginForm'])){
            $user_login -> attributes = $_POST['LoginForm'];
            //校验方法走的是rules()方法
            //不仅校验用户名和密码是否填写，还要校验密码的真实性
            if($user_login ->validate()){
                echo "succedd";
            }else{
                echo "fail";
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
    
    function actionCc(){
        echo "cc";
    }
}