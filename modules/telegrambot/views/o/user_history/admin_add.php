<?php
/**
 * Telegrambot User Histories (telegrambot-user-history)
 * @var $this UserhistoryController
 * @var $model TelegrambotUserHistory
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2017 Ommu Platform (ommu.co)
 * @created date 7 January 2017, 02:16 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Telegrambot User Histories'=>array('manage'),
		'Create',
	);
?>

<div class="form">
	<?php echo $this->renderPartial('/o/user_history/_form', array('model'=>$model)); ?>
</div>
