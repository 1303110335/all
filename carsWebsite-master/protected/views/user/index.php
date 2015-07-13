<div class="content">
    <div class="header">
        <h1 class="page-title">员工中心</h1>
    </div>
    <?php
    
    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
        'links' => array('员工中心' => array('index'), '员工列表'),
    ));
    ?>
    <div class="container-fluid">
        <div class="row-fluid">
        
            <div class="btn-toolbar">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'label' => '添加员工',
                    'type' => 'primary',
                    'url' => 'index.php?r=user/create',
                    'icon' => 'plus'
                ));
                ?>

            </div>
            
            
            <div class="well">
                <?php 
                
                $columns = array(array('name'=>'name','type'=>'html','value'=>'Chtml::link($data->name,array("user/view","id"=>$data->id))'), 'email', 'phone');
                if ($hasType) array_push($columns, 'type');
                
                array_push($columns, array('class'=>'bootstrap.widgets.TbButtonColumn', 'deleteConfirmation'=>'确认删除此条记录？', 'template' => '{view}{update}{delete}'));
                
                $this->widget('bootstrap.widgets.TbGridView', array(
                    'id' => 'user-grid',
                    'dataProvider' => $user->search(),
                    'filter' => $user,
                    'columns' => $columns,
                ));
                ?>
	