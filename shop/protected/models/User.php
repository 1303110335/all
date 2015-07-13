<?php
/*
* 用户模型model
* */
	class User extends CActiveRecord
	{
		
		//在当前模型增加一个属性password2,因为数据库表中没有该属性
		//我们可以在当前类直接设置该属性
		public $password2;
		
		/*返回当前模型对象的静态方法*/
		public static function model($className = __CLASS__){
			return parent::model($className);
		}	
		
		/*返回当前模型的名字*/
		public function tableName(){
			return '{{user}}';
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
				array('password2','compare','compareAttribute'=>'password','message'=>'两次密码必须一致'),
				//邮箱默认不能为空
				array('user_email','email','allowEmpty'=>FALSE,'message'=>'邮箱格式不正确'),
				//验证qq号码（都是数字组成，5-12位，开始为非0,使用正则验证）
				array('user_qq','match','pattern'=>'/[1-9]\d{4,11}/','message'=>'qq格式不正确'),
				//手机号验证（都是数字，13开始，一共有11位）
				array('user_tel','match','pattern'=>'/^1\d{10}/','message'=>'手机号码不正确'),
				//验证学历
				array('user_xueli','in','range'=>array(2,3,4,5),'message'=>'学历必须选择'),
				//验证爱好(必须选择两项以上)自定义方法对爱好进行验证
				array('user_hobby','check_hobby'),
				//为没有具体验证规则的属性，设置安全的验证规则
				array('user_sex,user_introduce','safe'),
			);
		}
		
		//对应标签名称
		function attributeLabels(){
			return array(
				'username'=>'用户名',
				'password'=>'密 	  码',
				'password2'=>'确认密码',
				'user_sex'=>'性  	  别',
				'user_qq'=>'qq号码',
				'user_hobby'=>'爱    好',
				'user_xueli'=>'学    历',
				'user_introduce'=>'简    介',
				'user_email'=>'邮    箱',
				'user_tel'=>'手机号码',
			);
		}
		
		/*在当前模型里定义一个方法check_hobby对爱好进行验证*/
		function check_hobby(){
			//在这里我们可以获得模型的相关信息
			//$this也就是我们实例化好 的模型对象

			$len = strlen($this->user_hobby);
			
			if($len < 2){
				$this->addError('user_hobby','爱好必须选择两项或以上');
			}
		}
		
	}

	
	
	
	
	
	
	
	