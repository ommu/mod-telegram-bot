<?php
/**
 * Telegrambot Settings (telegrambot-settings)
 * @var $this SettingController
 * @var $model TelegrambotSettings
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 7 January 2017, 02:15 WIB
 * @link https://github.com/ommu/mod-telegram-bot
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Settings'=>array('manage'),
		$model->setting_id,
	);
?>

<?php $this->widget('application.libraries.core.components.system.FDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'setting_id',
			'value'=>$model->setting_id,
			//'value'=>$model->setting_id != '' ? $model->setting_id : '-',
		),
		array(
			'name'=>'publish',
			'value'=>$model->publish == '1' ? Chtml::image(Yii::app()->theme->baseUrl.'/images/icons/publish.png') : Chtml::image(Yii::app()->theme->baseUrl.'/images/icons/unpublish.png'),
			//'value'=>$model->publish,
		),
		array(
			'name'=>'bot_username',
			'value'=>$model->bot_username,
			//'value'=>$model->bot_username != '' ? $model->bot_username : '-',
		),
		array(
			'name'=>'bot_token',
			'value'=>$model->bot_token != '' ? $model->bot_token : '-',
			//'value'=>$model->bot_token != '' ? CHtml::link($model->bot_token, Yii::app()->request->baseUrl.'/public/visit/'.$model->bot_token, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'bot_name',
			'value'=>$model->bot_name,
			//'value'=>$model->bot_name != '' ? $model->bot_name : '-',
		),
		array(
			'name'=>'bot_description',
			'value'=>$model->bot_description != '' ? $model->bot_description : '-',
			//'value'=>$model->bot_description != '' ? CHtml::link($model->bot_description, Yii::app()->request->baseUrl.'/public/visit/'.$model->bot_description, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'bot_about_text',
			'value'=>$model->bot_about_text != '' ? $model->bot_about_text : '-',
			//'value'=>$model->bot_about_text != '' ? CHtml::link($model->bot_about_text, Yii::app()->request->baseUrl.'/public/visit/'.$model->bot_about_text, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'bot_userpic',
			'value'=>$model->bot_userpic != '' ? $model->bot_userpic : '-',
			//'value'=>$model->bot_userpic != '' ? CHtml::link($model->bot_userpic, Yii::app()->request->baseUrl.'/public/visit/'.$model->bot_userpic, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'webhook_url',
			'value'=>$model->webhook_url != '' ? $model->webhook_url : '-',
			//'value'=>$model->webhook_url != '' ? CHtml::link($model->webhook_url, Yii::app()->request->baseUrl.'/public/visit/'.$model->webhook_url, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'webhook_certificate',
			'value'=>$model->webhook_certificate != '' ? $model->webhook_certificate : '-',
			//'value'=>$model->webhook_certificate != '' ? CHtml::link($model->webhook_certificate, Yii::app()->request->baseUrl.'/public/visit/'.$model->webhook_certificate, array('target' => '_blank')) : '-',
			'type'=>'raw',
		),
		array(
			'name'=>'webhook_max_connections',
			'value'=>$model->webhook_max_connections,
			//'value'=>$model->webhook_max_connections != '' ? $model->webhook_max_connections : '-',
		),
		array(
			'name'=>'webhook_allowed_updates',
			'value'=>$model->webhook_allowed_updates != '' ? $model->webhook_allowed_updates : '-',
			//'value'=>$model->webhook_allowed_updates != '' ? CHtml::link($model->webhook_allowed_updates, Yii::app()->request->baseUrl.'/public/visit/'.$model->webhook_allowed_updates, array('target' => '_blank')) : '-',
			'type'=>'raw',
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