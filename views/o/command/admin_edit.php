<?php
/**
 * Telegrambot Commands (telegrambot-commands)
 * @var $this CommandController
 * @var $model TelegrambotCommands
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 7 January 2017, 02:15 WIB
 * @link https://github.com/ommu/ommu-telegram-bot
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Commands'=>array('manage'),
		$model->command_id=>array('view','id'=>$model->command_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'setting'=>$setting,
)); ?>