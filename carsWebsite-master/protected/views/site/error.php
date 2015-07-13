<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div class="content">
<div class="header">
	<h2>Error <?php echo $code; ?></h2>
</div>


<div class="error">
<?php echo CHtml::encode($message); ?>
</div>
</div>