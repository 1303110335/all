<?php

/*
商品模型
model()创建模型对象
tableName()返回当前数据表的名字
*/

class Goods extends CActiveRecord
{
	/*返回当前模型对象的静态方法*/
	public static function model($className = __CLASS__){
		return parent::model($className);
	}	
	
	/*返回当前模型的名字*/
	public function tableName(){
		return '{{goods}}';
	}
	
	/*可以定义其他方法*/
	
	
	//对应标签名称
	function attributeLabels(){
		return array(
			'goods_name'=>'商品名称',
			'goods_weight'=>'重量',
			'goods_price'=>'价格',
			'goods_number'=>'数量',
			'goods_category_id'=>'分类',
			'goods_brand_id'=>'品牌',
			'goods_introduce'=>'介绍',
			'goods_small_img'=>'图片',
		);
	}
	
	
}