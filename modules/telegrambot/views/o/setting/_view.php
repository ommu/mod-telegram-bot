<?php
/**
 * Telegrambot Settings (telegrambot-settings)
 * @var $this SettingController
 * @var $data TelegrambotSettings
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

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->setting_id), array('view', 'id'=>$data->setting_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish')); ?>:</b>
	<?php echo CHtml::encode($data->publish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_username')); ?>:</b>
	<?php echo CHtml::encode($data->bot_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_token')); ?>:</b>
	<?php echo CHtml::encode($data->bot_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_name')); ?>:</b>
	<?php echo CHtml::encode($data->bot_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_description')); ?>:</b>
	<?php echo CHtml::encode($data->bot_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_about_text')); ?>:</b>
	<?php echo CHtml::encode($data->bot_about_text); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bot_userpic')); ?>:</b>
	<?php echo CHtml::encode($data->bot_userpic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webhook_url')); ?>:</b>
	<?php echo CHtml::encode($data->webhook_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webhook_certificate')); ?>:</b>
	<?php echo CHtml::encode($data->webhook_certificate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webhook_max_connections')); ?>:</b>
	<?php echo CHtml::encode($data->webhook_max_connections); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('webhook_allowed_updates')); ?>:</b>
	<?php echo CHtml::encode($data->webhook_allowed_updates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_id')); ?>:</b>
	<?php echo CHtml::encode($data->modified_id); ?>
	<br />

	*/ ?>

</div>