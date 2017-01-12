<?php
/**
 * Telegrambot Commands (telegrambot-commands)
 * @var $this CommandController
 * @var $model TelegrambotCommands
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (ommu.co)
 * @created date 7 January 2017, 02:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Commands'=>array('manage'),
		$model->command_id,
	);
?>

<div class="dialog-content">
	<?php $this->widget('application.components.system.FDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name'=>'command_id',
				'value'=>$model->command_id,
				//'value'=>$model->command_id != '' ? $model->command_id : '-',
			),
			array(
				'name'=>'publish',
				'value'=>$model->publish == '1' ? Chtml::image(Yii::app()->theme->baseUrl.'/images/icons/publish.png') : Chtml::image(Yii::app()->theme->baseUrl.'/images/icons/unpublish.png'),
				//'value'=>$model->publish,
			),
			array(
				'name'=>'setting_id',
				'value'=>$model->setting_id,
				//'value'=>$model->setting_id != '' ? $model->setting_id : '-',
			),
			array(
				'name'=>'command_name',
				'value'=>$model->command_name,
				//'value'=>$model->command_name != '' ? $model->command_name : '-',
			),
			array(
				'name'=>'command_desc',
				'value'=>$model->command_desc != '' ? $model->command_desc : '-',
				//'value'=>$model->command_desc != '' ? CHtml::link($model->command_desc, Yii::app()->request->baseUrl.'/public/visit/'.$model->command_desc, array('target' => '_blank')) : '-',
				'type'=>'raw',
			),
			array(
				'name'=>'creation_date',
				'value'=>!in_array($model->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00')) ? Utility::dateFormat($model->creation_date, true) : '-',
			),
			array(
				'name'=>'creation_id',
				'value'=>$model->creation_id,
				//'value'=>$model->creation_id != 0 ? $model->creation_id : '-',
			),
			array(
				'name'=>'modified_date',
				'value'=>!in_array($model->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00')) ? Utility::dateFormat($model->modified_date, true) : '-',
			),
			array(
				'name'=>'modified_id',
				'value'=>$model->modified_id,
				//'value'=>$model->modified_id != 0 ? $model->modified_id : '-',
			),
		),
	)); ?>
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>