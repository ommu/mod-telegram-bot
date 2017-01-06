<?php
/**
 * Telegrambot Users (telegrambot-users)
 * @var $this UsersController
 * @var $data TelegrambotUsers
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (ommu.co)
 * @created date 7 January 2017, 02:16 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->subscribe_id), array('view', 'id'=>$data->subscribe_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_id')); ?>:</b>
	<?php echo CHtml::encode($data->setting_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telegram_id')); ?>:</b>
	<?php echo CHtml::encode($data->telegram_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telegram_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->telegram_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telegram_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->telegram_last_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telegram_username')); ?>:</b>
	<?php echo CHtml::encode($data->telegram_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_date')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_id')); ?>:</b>
	<?php echo CHtml::encode($data->creation_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_id')); ?>:</b>
	<?php echo CHtml::encode($data->modified_id); ?>
	<br />

	*/ ?>

</div>