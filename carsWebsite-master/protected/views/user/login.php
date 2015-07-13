<!--产品列表页面 -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>后台管理</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/stylesheets/theme.css">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/lib/font-awesome/css/font-awesome.css">
<script src="<?php echo Yii::app()->theme->baseUrl;?>/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<!-- Demo page code -->
<style type="text/css">
#line-chart {
	height: 300px;
	width: 800px;
	margin: 0px auto;
	margin-top: 1em;
}

.brand {
	font-family: georgia, serif;
}

.brand .first {
	color: #ccc;
	font-style: italic;
}

.brand .second {
	color: #fff;
	font-weight: bold;
}
</style>
<div class="row-fluid">
	<div class="dialog">
		<div class="block">
			<p class="block-heading">登录</p>
			<div class="block-body">
				<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
							'id'=>'login-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
							//'type'=>'horizontal',
				)); ?>
					<?php echo $form->textFieldRow($model,'username', array('class'=>'span12')); ?>
					<?php echo $form->passwordFieldRow($model,'password', array('class'=>'span12')); ?>
					<?php echo $form->checkboxRow($model,'rememberMe',array('style'=>'height:20px;vertical-align:middle;','checked'=>'checked')); ?>
                            
					<div class="row buttons">
						<?php echo CHtml::submitButton('登录', array('class'=>'btn btn-primary pull-right')); ?>
					</div>
					<?php $this->endWidget(); ?>
			</div>
		</div>
		
	</div>
</div>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
            $('.checkbox').css({paddingLeft:'0px'});
        });
    </script>


</body>
</html>
