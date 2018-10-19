<?php
/**
 * Telegrambot Users (telegrambot-users)
 * @var $this UsersController
 * @var $model TelegrambotUsers
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 7 January 2017, 02:16 WIB
 * @link https://github.com/ommu/mod-telegram-bot
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot Users'=>array('manage'),
		$model->subscribe_id=>array('view','id'=>$model->subscribe_id),
		Yii::t('phrase', 'Update'),
	);
?>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'setting'=>$setting,
)); ?>