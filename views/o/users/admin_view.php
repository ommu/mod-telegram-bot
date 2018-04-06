<?php
/**
 * Telegrambot Users (telegrambot-users)
 * @var $this UsersController
 * @var $model TelegrambotUsers
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 7 January 2017, 02:16 WIB
 * @link https://github.com/ommu/mod-telegram-bot
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Users'=>array('manage'),
		$model->subscribe_id,
	);
?>

<div class="dialog-content">
	<?php $this->widget('application.libraries.core.components.system.FDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name'=>'subscribe_id',
				'value'=>$model->subscribe_id,
				//'value'=>$model->subscribe_id != '' ? $model->subscribe_id : '-',
			),
			array(
				'name'=>'subscribe',
				'value'=>$model->subscribe,
				//'value'=>$model->subscribe != '' ? $model->subscribe : '-',
			),
			array(
				'name'=>'setting_id',
				'value'=>$model->setting_id,
				//'value'=>$model->setting_id != '' ? $model->setting_id : '-',
			),
			array(
				'name'=>'user_id',
				'value'=>$model->user_id,
				//'value'=>$model->user_id != '' ? $model->user_id : '-',
			),
			array(
				'name'=>'telegram_id',
				'value'=>$model->telegram_id,
				//'value'=>$model->telegram_id != '' ? $model->telegram_id : '-',
			),
			array(
				'name'=>'telegram_first_name',
				'value'=>$model->telegram_first_name != '' ? $model->telegram_first_name : '-',
				//'value'=>$model->telegram_first_name != '' ? CHtml::link($model->telegram_first_name, Yii::app()->request->baseUrl.'/public/visit/'.$model->telegram_first_name, array('target' => '_blank')) : '-',
				'type'=>'raw',
			),
			array(
				'name'=>'telegram_last_name',
				'value'=>$model->telegram_last_name != '' ? $model->telegram_last_name : '-',
				//'value'=>$model->telegram_last_name != '' ? CHtml::link($model->telegram_last_name, Yii::app()->request->baseUrl.'/public/visit/'.$model->telegram_last_name, array('target' => '_blank')) : '-',
				'type'=>'raw',
			),
			array(
				'name'=>'telegram_username',
				'value'=>$model->telegram_username,
				//'value'=>$model->telegram_username != '' ? $model->telegram_username : '-',
			),
			array(
				'name'=>'subscribe_date',
				'value'=>!in_array($model->subscribe_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00')) ? Utility::dateFormat($model->subscribe_date, true) : '-',
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
