<!--放入view具体内容-->

<div class="block box">

    <div class="usBox">
        <div class="usBox_2 clearfix">
            <div class="logtitle3"></div>
            <?php $form = $this->beginWidget('CActiveForm');?>
                 <table cellpadding="5" cellspacing="3" style="text-align:left; width:100%; border:0;">
                    <tbody>
                        <tr>
                            <td style="width:13%; text-align: right;">
                            	<?php echo $form->labelEx($user_model,'username');?>
                            </td>

                            <td style="width:87%;">
                               	<?php echo $form->textField($user_model,'username',array('class'=>'imputBg','id'=>'User_username'));?>
                            	<?php echo $form->error($user_model,'username');?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <?php echo $form->labelEx($user_model,'password');?>
                            </td>

                            <td>
                            	<?php echo $form->passwordField($user_model,'password',array('class'=>'imputBg','id'=>'User_password'));?>
                            	<?php echo $form->error($user_model,'password');?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><?php echo $form->label($user_model,'password2');?></td>
                            <td>
                                <?php echo $form->passwordField($user_model,'password2',array('class'=>'imputBg','id'=>'User_password2'));?>
                                <?php echo $form->error($user_model,'password2');?>
                            </td>

                        </tr>
                       	<tr>
                            <td align="right"><?php echo $form->label($user_model,'user_email');?></td>
                            <td>
                                <?php echo $form->textField($user_model,'user_email',array('class'=>'imputBg','id'=>'User_email'));?>  
                                <?php echo $form->error($user_model,'user_email');?> 
                            </td>
                        </tr>
                        <tr>

                            <td align="right"><?php echo $form->label($user_model,'user_qq');?></td>
                            <td>
                                <?php echo $form->textField($user_model,'user_qq',array('class'=>'imputBg','id'=>'User_qq'));?>
                                 <?php echo $form->error($user_model,'user_qq');?> 
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><?php echo $form->label($user_model,'user_tel');?></td>
                            <td>
                                <?php echo $form->textField($user_model,'user_tel',array('class'=>'imputBg','id'=>'User_tel','maxlength'=>11));?>
                                 <?php echo $form->error($user_model,'user_tel');?> 
                            </td>
                        </tr>
                        <tr>
                        	<td align="right"><?php echo $form -> label($user_model,'user_sex');?></td>
                            <!--radioButtonList($model,$attribute,$data,$htmlOptions=array())-->
                            <td><?php echo $form->radioButtonList($user_model,'user_sex',$sex,array('separator'=>'&nbsp;'));?></td>
                        </tr>
                        <tr>
                            <!--dropDownList($model,$attribute,$data,$htmlOptions=array())-->
                            <td align="right"><?php echo $form -> label($user_model,'user_xueli');?></td>
                            <td>
                                <?php echo $form -> dropDownList($user_model,'user_xueli',$xueli);?>
                                 <?php echo $form->error($user_model,'user_xueli');?> 
                            </tr>
                        <tr>
                            <!--checkBoxList($model,$attribute,$data,$htmlOptions=array())-->
                            <td align="right"><?php echo $form -> label($user_model,'user_hobby');?></td>

                            <td>
                            	<?php echo $form -> checkBoxList($user_model,'user_hobby',$hobby,array('separator'=>'&nbsp;'));?>
                            	 <?php echo $form->error($user_model,'user_hobby');?> 
                            </td>
                        </tr>
                        <tr>

                            <!--textArea($model,$attribute,$htmlOptions=array())-->
                            <td align="right"><?php echo $form -> label($user_model,'user_introduce');?></td>
                            <td>
                                <?php echo $form -> textArea($user_model,'user_introduce',array('cols'=>50,'rows'=>5));?>  
                                 <?php echo $form->error($user_model,'user_introduce');?>                    
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>

                            <td align="left">
                                <input name="Submit" value="" class="us_Submit_reg" type="submit" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
			<?php $this->endwidget();?>
         </div>
    </div>
</div>
<!--放入view具体内容-->

</div>

