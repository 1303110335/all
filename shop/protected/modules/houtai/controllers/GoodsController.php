<?php
/**
 * 后台商品管理控制器 
 */
class GoodsController extends Controller {
    /*
     * 商品展示
     */
    function actionShow(){
    	//通过模型model实现数据表信息查询
    	//产生模型对象
    	$goods_model=Goods::model();
    	
    	//通过model模型对象调用方法
    	/*$goods_infos = $goods_model->find();//每次只可以查询一条商品信息
    	echo $goods_infos->goods_name,"<br/>";
    	echo $goods_infos->goods_price,"<br/>";*/
    	//var_dump($goods_infos);
    	
    	$goods_infos = $goods_model->findAll();//查询出全部数据

    	/*foreach($goods_infos as $v){
    		echo $v->goods_name."--";
    		echo $v->goods_price,"<br/>";
    	}*/
    	
    	//通过具体具体sql语句来获得商品信息
    	//$sql="select goods_name,goods_price,goods_create_time from {{goods}} limit 10;";
    	//$goods_infos = $goods_model->findAllBySql($sql);
    	//var_dump($goods_infos);
    	
    	//把获得的数据信息传递到视图模板中
    	//renderPartial('show',array('name'=>'value','name'=>'value'));

        $this ->renderPartial('show',array('goods_infos'=>$goods_infos));
    }

    
    
    /*
	 *建立一个测试方法，来实现分页显示
	 */
    function actionshow1(){
    	$goods_model = Goods::model();
    	
    	//获得总的记录数
    	$cnt = $goods_model->count();
    	
    	//每页的数目
    	$per = 6;
    	
    	//实例化分页类对象
    	$page = new Page($cnt,$per);
    	
    	//重新按照分页的样式拼装sql语句
    	$sql = "select * from {{goods}} $page->limit";
    	
    	$goods_infos = $goods_model->findAllBySql($sql);
		
    	//获得分页页面列表
    	$page_list = $page -> fpage(array(3,4,5,6,7));
    	
    	$this ->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list));
    }
    


	/*
     * 添加商品
     */
    function actionAdd(){
    	$goods_model = new Goods();

    	//如果表单有提交
    	if(isset($_POST['Goods'])){
    		//我们要把从表单提交过来的数据赋予$goods_model
    		//$goods_model->goods_name = $_POST['Goods'];
    		
    		//代码优化
    		foreach($_POST['Goods'] as $k => $v){
    			$goods_model -> $k = $v;
    		}
    		$goods_model->goods_create_time=time();

    		if($goods_model->save()){
    			//重定向到商品列表页面
    			$this->redirect('./index.php?r=houtai/goods/show');
    		}else{
    			echo "fail";
    		}
    	}
        $this ->renderPartial('add',array('goods_model'=>$goods_model));
    }
    
    

	/*
     * 修改商品
     */
    function actionUpdate($id){
		//选择了那个商品
		//框架对get信息进行封装
		$goods_model = Goods::model();//一般除了add之外，都使用model方法来进行实例化
		
		$goods_info = $goods_model->findByPk($id);
		
		if(isset($_POST['Goods'])){
			foreach($_POST['Goods'] as $k => $v){
				$goods_info->$k = $v;
			}
			
			if($goods_info->save()){
				$this->redirect('./index.php?r=houtai/goods/show');
			}
		}

        $this ->renderPartial('update',array('goods_model'=>$goods_info));
    }
    
    

	/*
	 *删除商品信息
	 */
    function actionDel($id){
 		$goods_model = Goods::model();//一般除了add之外，都使用model方法来进行实例化
		
 		$goods_info = $goods_model -> findByPk($id);//获得被删除对象的商品模型
 		
		if($goods_info->delete()){
			$this->redirect('./index.php?r=houtai/goods/show');
		}
    }
    
    
    
    //测试
    function actiontest(){
    	$model = Goods::model();
    	//$infos = $model-> findAllByPk(array(3,10,18));
    	//----------------------第一种-------------------------------------------------
    	//查询诺基亚手机并且价格大于500
    	//$infos = $model ->findAll("goods_name like :name and goods_price > :price;",
    	//array(':name'=>'诺%',':price'=>'1000'));
    	//-----------------------第二种------------------------------------------------
/*    	$infos = $model -> findAll(array(
    		'select' => 'goods_name,goods_price',
    		'condition' => 'goods_name like "诺%"',
    		'order'=>'goods_price desc',
			'limit'=>3,
    		'offset'=>6,
    	));*/
    	//-----------------------第三种------------------------------------------------
    	$criteria = new CDbCriteria();
    	$criteria->select = "goods_name,goods_price";
    	$criteria->condition ="goods_name like '诺%'";
    	$infos = $model->findAll($criteria);
    	$this ->renderPartial('show',array('goods_infos'=>$infos));
    }
    
    /*通过模型实现数据添加*/
    /*function actionJia(){
    	//创建模型对象
    	$goods_model = new Goods();//我们需要添加数据，创建对象方式有别于查询
    	
    	//为对象丰富属性
    	$goods_model->goods_name = 'iphone 6+';
    	$goods_model->goods_price = 6999;
    	$goods_model->goods_weight = 120;
    	
    	if($goods_model->save()){
    		echo "success";
    	}else{
    		echo "fail";
    	}
    	
    }*/
}