<div class="content">
    <div class="header">

        <h1 class="page-title">员工中心</h1>
    </div>

    <?php
    /* @var $this CustomerController */

    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links'=>array('员工中心'=>array('index'), '修改员工信息'),
    )); ?>
    <div class="container-fluid">
  <?php echo $this->renderPartial('_form', array('model'=>$model, 'types'=>$types)); ?>
</div>
      
</div>