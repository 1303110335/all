<?php

/*
 * 后台管理员数据模型
 * model()
 * tableName()
 * rules()
 * attributeLabels()
 * */
class Manager extends CActiveRecord{
/*返回当前模型对象的静态方法*/
		public static function model($className = __CLASS__){
			return parent::model($className);
		}	
		
		/*返回当前模型的名字*/
		public function tableName(){
			return '{{Manager}}';
		}
		
		/*可以定义其他方法*/
		
		/*实现用户注册表单验证
		 *在模型里设置一个方法
 	     */
		public function rules(){
			return array(
				//用户名不能为空
				array('username','required','message'=>'用户名必填'),
				//用户名不能重复
				array('username','unique','message'=>'用户名不能重复'),
				
				array('password','required','message'=>'密码必填'),
				//验证确认密码,要与密码的信息一致
			);
		}
		
		//对应标签名称
		function attributeLabels(){
			return array(
				'username'=>'用户名',
				'password'=>'密 	  码',
			);
		}
    
}