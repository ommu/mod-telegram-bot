<?php
/**
 * TelegrambotUserHistory
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 7 January 2017, 01:59 WIB
 * @link https://github.com/ommu/mod-telegram-bot
 *
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 *
 * --------------------------------------------------------------------------------------
 *
 * This is the model class for table "ommu_telegrambot_user_history".
 *
 * The followings are the available columns in table 'ommu_telegrambot_user_history':
 * @property string $id
 * @property string $subscribe_id
 * @property integer $status
 * @property string $status_date
 *
 * The followings are the available model relations:
 * @property TelegrambotUsers $subscribe
 */
class TelegrambotUserHistory extends CActiveRecord
{
	use GridViewTrait;

	public $defaultColumns = array();
	
	// Variable Search
	public $user_search;
	public $telegram_search;
	public $username_search;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TelegrambotUserHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ommu_telegrambot_user_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subscribe_id, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('subscribe_id', 'length', 'max'=>11),
			array('status_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subscribe_id, status, status_date,
				user_search, telegram_search, username_search', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'subscribe' => array(self::BELONGS_TO, 'TelegrambotUsers', 'subscribe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('attribute', 'ID'),
			'subscribe_id' => Yii::t('attribute', 'Subscribe'),
			'status' => Yii::t('attribute', 'Status'),
			'status_date' => Yii::t('attribute', 'Status Date'),
			'user_search' => Yii::t('attribute', 'User'),
			'telegram_search' => Yii::t('attribute', 'Telegram ID'),
			'username_search' => Yii::t('attribute', 'Username'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		// Custom Search
		$criteria->with = array(
			'subscribe' => array(
				'alias'=>'subscribe',
				'select'=>'user_id, telegram_id, telegram_username',
			),
			'subscribe.user' => array(
				'alias'=>'user',
				'select'=>'displayname',
			),
		);

		$criteria->compare('t.id', strtolower($this->id), true);
		if(Yii::app()->getRequest()->getParam('subscribe'))
			$criteria->compare('t.subscribe_id', Yii::app()->getRequest()->getParam('subscribe'));
		else
			$criteria->compare('t.subscribe_id', $this->subscribe_id);
		if(Yii::app()->getRequest()->getParam('type') == 'subscribe')
			$criteria->compare('t.status',1);
		else
			$criteria->compare('t.status', $this->status);
		if($this->status_date != null && !in_array($this->status_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.status_date)', date('Y-m-d', strtotime($this->status_date)));
		
		$criteria->compare('user.displayname', strtolower($this->user_search), true);
		$criteria->compare('subscribe.telegram_id', strtolower($this->telegram_search), true);
		$criteria->compare('subscribe.telegram_username', strtolower($this->username_search), true);

		if(!Yii::app()->getRequest()->getParam('TelegrambotUserHistory_sort'))
			$criteria->order = 't.id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		} else {
			//$this->defaultColumns[] = 'id';
			$this->defaultColumns[] = 'subscribe_id';
			$this->defaultColumns[] = 'status';
			$this->defaultColumns[] = 'status_date';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			if(!Yii::app()->getRequest()->getParam('subscribe')) {
				$this->defaultColumns[] = array(
					'name' => 'user_search',
					'value' => '$data->subscribe->user_id != 0 ? $data->subscribe->user->displayname : "-"',
				);
				$this->defaultColumns[] = array(
					'name' => 'username_search',
					'value' => '$data->subscribe->telegram_username != \'\' ? $data->subscribe->telegram_username : "-"',
				);
				$this->defaultColumns[] = array(
					'name' => 'telegram_search',
					'value' => '$data->subscribe->telegram_id',
				);
			}
			$this->defaultColumns[] = array(
				'name' => 'status_date',
				'value' => 'Utility::dateFormat($data->status_date, true)',
				'htmlOptions' => array(
					//'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('application.libraries.core.components.system.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'status_date',
					'language' => 'en',
					'i18nScriptFile' => 'jquery-ui-i18n.min.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'status_date_filter',
					),
					'options'=>array(
						'showOn' => 'focus',
						'dateFormat' => 'yy-mm-dd',
						'showOtherMonths' => true,
						'selectOtherMonths' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showButtonPanel' => true,
					),
				), true),
			);
			$this->defaultColumns[] = array(
				'name' => 'status',
				'value' => '$data->status == 1 ? CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/publish.png\') : CHtml::image(Yii::app()->theme->baseUrl.\'/images/icons/unpublish.png\')',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => $this->filterYesNo(),
				'type' => 'raw',
			);
		}
		parent::afterConstruct();
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::model()->findByPk($id, array(
				'select' => $column,
			));
 			if(count(explode(',', $column)) == 1)
 				return $model->$column;
 			else
 				return $model;
			
		} else {
			$model = self::model()->findByPk($id);
			return $model;
		}
	}

}