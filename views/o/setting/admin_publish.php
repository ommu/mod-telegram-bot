<?php
/**
 * Telegrambot Settings (telegrambot-settings)
 * @var $this SettingController
 * @var $model TelegrambotSettings
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 7 January 2017, 02:15 WIB
 * @link https://github.com/ommu/mod-telegram-bot
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Settings'=>array('manage'),
		'Publish',
	);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'telegrambot-settings-form',
	'enableAjaxValidation'=>true,
)); ?>

	<div class="dialog-content">
		<?php echo $model->publish == 1 ? Yii::t('phrase', 'Are you sure you want to unpublish this item?') : Yii::t('phrase', 'Are you sure you want to publish this item?')?>
	</div>
	<div class="dialog-submit">
		<?php echo CHtml::submitButton($title, array('onclick' => 'setEnableSave()')); ?>
		<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
	</div>
	
<?php $this->endWidget(); ?>
