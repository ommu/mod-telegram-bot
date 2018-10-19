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
		Yii::t('phrase', 'Create'),
	);
?>

<div class="form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
