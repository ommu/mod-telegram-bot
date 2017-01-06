<?php
/**
 * Telegrambot Settings (telegrambot-settings)
 * @var $this SettingController
 * @var $model TelegrambotSettings
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (ommu.co)
 * @created date 7 January 2017, 02:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'telegrambot-settings-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

<?php //begin.Messages ?>
<div id="ajax-message">
	<?php echo $form->errorSummary($model); ?>
</div>
<?php //begin.Messages ?>

<fieldset>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'publish'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'publish'); ?>
			<?php echo $form->labelEx($model,'publish'); ?>
			<?php echo $form->error($model,'publish'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'bot_username'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'bot_username',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'bot_username'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'bot_token'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'bot_token',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'bot_token'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'bot_name'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'bot_name',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'bot_name'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'bot_description'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'bot_description',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'bot_description'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'bot_about_text'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'bot_about_text',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'bot_about_text'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'bot_userpic'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'bot_userpic',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'bot_userpic'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'webhook_url'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'webhook_url',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'webhook_url'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'webhook_certificate'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'webhook_certificate',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'webhook_certificate'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'webhook_max_connections'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'webhook_max_connections'); ?>
			<?php echo $form->error($model,'webhook_max_connections'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'webhook_allowed_updates'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'webhook_allowed_updates',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'webhook_allowed_updates'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'modified_date'); ?>
			<?php echo $form->error($model,'modified_date'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'modified_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'modified_id',array('size'=>11,'maxlength'=>11)); ?>
			<?php echo $form->error($model,'modified_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="submit clearfix">
		<label>&nbsp;</label>
		<div class="desc">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
		</div>
	</div>

</fieldset>
<?php /*
<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
</div>
*/?>
<?php $this->endWidget(); ?>


