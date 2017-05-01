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
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Users'=>array('manage'),
		'Create',
	);
?>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'setting'=>$setting,
)); ?>