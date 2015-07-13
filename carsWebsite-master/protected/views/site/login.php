<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="login">
	<div class="container" id="usercontent">
		<?php
		/* @var $this SiteController */
		/* @var $model LoginForm */
		/* @var $form CActiveForm  */

		$this->pageTitle=Yii::app()->name . ' - Login';
		$this->breadcrumbs=array(
	'Login',
);
?>
		<h1>Login</h1>
		<p>Please fill out the following form with your login credentials:</p>
		<div class="form">
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
			<p class="note">
				Fields with <span class="required">*</span> are required.
			</p>
			<?php echo $form->textFieldRow($model,'username'); ?>
			<?php echo $form->passwordFieldRow($model,'password'); ?>
			<?php echo $form->checkboxRow($model,'rememberMe'); ?>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Login'); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
		<!-- form -->
	</div>
	<!-- page -->
</body>
</html>
