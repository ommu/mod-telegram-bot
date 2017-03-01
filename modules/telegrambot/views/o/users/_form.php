<?php
/**
 * Telegrambot Users (telegrambot-users)
 * @var $this UsersController
 * @var $model TelegrambotUsers
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 7 January 2017, 02:16 WIB
 * @link https://github.com/ommu/TelegramBot
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'telegrambot-users-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
<div class="dialog-content">
	<fieldset>

		<?php //begin.Messages ?>
		<div id="ajax-message">
			<?php echo $form->errorSummary($model); ?>
		</div>
		<?php //begin.Messages ?>
		
		<?php if(empty($setting) || (!empty($setting) && count($setting) > 1)) {?>
		<div class="clearfix">
			<?php echo $form->labelEx($model,'setting_id'); ?>
			<div class="desc">
				<?php 
				//echo $form->textField($model,'setting_id');
				if(!empty($setting))
					echo $form->dropDownList($model,'setting_id', $setting);
				else
					echo $form->dropDownList($model,'setting_id', array('prompt'=>'Select Bot')); ?>
				<?php echo $form->error($model,'setting_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>
		<?php }?>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'user_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'user_id',array('maxlength'=>11)); ?>
				<?php echo $form->error($model,'user_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'telegram_id'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'telegram_id',array('maxlength'=>11, 'class'=>'span-7')); ?>
				<?php echo $form->error($model,'telegram_id'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'telegram_first_name'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'telegram_first_name',array('rows'=>6, 'cols'=>50, 'class'=>'span-8')); ?>
				<?php echo $form->error($model,'telegram_first_name'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'telegram_last_name'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'telegram_last_name',array('rows'=>6, 'cols'=>50, 'class'=>'span-8')); ?>
				<?php echo $form->error($model,'telegram_last_name'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'telegram_username'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'telegram_username',array('maxlength'=>32, 'class'=>'span-7')); ?>
				<?php echo $form->error($model,'telegram_username'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

		<div class="clearfix publish">
			<?php echo $form->labelEx($model,'subscribe'); ?>
			<div class="desc">
				<?php echo $form->checkBox($model,'subscribe'); ?>
				<?php echo $form->labelEx($model,'subscribe'); ?>
				<?php echo $form->error($model,'subscribe'); ?>
				<?php /*<div class="small-px silent"></div>*/?>
			</div>
		</div>

	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
</div>
<?php $this->endWidget(); ?>


