<?php
/**
 * 后台管理员登录控制器
 * 13-5-8 下午9:03 
 */
class ManagerController extends Controller{
    /*
     * 实现用户登录
     */
    function actionLogin(){
        
        $user_login = new LoginForm;
        
        if(isset($_POST['LoginForm'])){
            $user_login->attributes = $_POST['LoginForm'];
            
            //用户名和密码判断(真实性),持久化session信息
            if($user_login->validate() && $user_login->login()){
                $this->redirect('./index.php?r=houtai/index/index');
            }
        }
        
        
        //调用模板
        $this ->renderPartial('login',array('user_login'=>$user_login));
    }
    
    /*
     * 后台退出
     * */
    function actionLogout(){
        //删除session变量
        Yii::app()->session->clear();
        //删除session在服务器中的信息
        Yii::app()->session->destroy();
        $this->redirect('./index.php?r=houtai/manager/login');
        
    }
    
}