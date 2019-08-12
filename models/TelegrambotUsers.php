<?php
/**
 * TelegrambotUsers
 *
 * @author Putra Sudaryanto <putra@ommu.co>
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
 * This is the model class for table "ommu_telegrambot_users".
 *
 * The followings are the available columns in table 'ommu_telegrambot_users':
 * @property string $subscribe_id
 * @property integer $status
 * @property integer $setting_id
 * @property string $user_id
 * @property string $telegram_id
 * @property string $telegram_first_name
 * @property string $telegram_last_name
 * @property string $telegram_username
 * @property string $telegram_type
 * @property string $subscribe_date
 * @property string $creation_date
 * @property string $creation_id
 * @property string $modified_date
 * @property string $modified_id
 *
 * The followings are the available model relations:
 * @property TelegrambotUserHistory[] $TelegrambotUserHistories
 * @property TelegrambotSettings $setting
 */
class TelegrambotUsers extends CActiveRecord
{
	use GridViewTrait;

	public $defaultColumns = array();
	
	// Variable Search
	public $setting_search;
	public $user_search;
	public $creation_search;
	public $modified_search;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TelegrambotUsers the static model class
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
		return 'ommu_telegrambot_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setting_id, telegram_id, telegram_first_name, telegram_type', 'required'),
			array('status, setting_id', 'numerical', 'integerOnly'=>true),
			array('user_id, creation_id, modified_id', 'length', 'max'=>11),
			array('telegram_id', 'length', 'max'=>16),
			array('telegram_username', 'length', 'max'=>32),
			array('user_id, telegram_last_name, telegram_username, telegram_type', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('subscribe_id, status, setting_id, user_id, telegram_id, telegram_first_name, telegram_last_name, telegram_username, telegram_type, subscribe_date, creation_date, creation_id, modified_date, modified_id,
				setting_search, user_search, creation_search, modified_search', 'safe', 'on'=>'search'),
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
			'view' => array(self::BELONGS_TO, 'ViewTelegrambotUsers', 'subscribe_id'),
			'histories' => array(self::HAS_MANY, 'TelegrambotUserHistory', 'subscribe_id'),
			'setting' => array(self::BELONGS_TO, 'TelegrambotSettings', 'setting_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'creation' => array(self::BELONGS_TO, 'Users', 'creation_id'),
			'modified' => array(self::BELONGS_TO, 'Users', 'modified_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'subscribe_id' => Yii::t('attribute', 'Subscribe'),
			'status' => Yii::t('attribute', 'Status'),
			'setting_id' => Yii::t('attribute', 'Setting'),
			'user_id' => Yii::t('attribute', 'User'),
			'telegram_id' => Yii::t('attribute', 'Telegram ID'),
			'telegram_first_name' => Yii::t('attribute', 'First Name'),
			'telegram_last_name' => Yii::t('attribute', 'Last Name'),
			'telegram_username' => Yii::t('attribute', 'Username'),
			'telegram_type' => Yii::t('attribute', 'Type'),
			'subscribe_date' => Yii::t('attribute', 'Subscribe Date'),
			'creation_date' => Yii::t('attribute', 'Creation Date'),
			'creation_id' => Yii::t('attribute', 'Creation'),
			'modified_date' => Yii::t('attribute', 'Modified Date'),
			'modified_id' => Yii::t('attribute', 'Modified'),
			'setting_search' => Yii::t('attribute', 'Setting'),
			'user_search' => Yii::t('attribute', 'User'),
			'creation_search' => Yii::t('attribute', 'Creation'),
			'modified_search' => Yii::t('attribute', 'Modified'),
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
			'view' => array(
				'alias' => 'view',
			),
			'setting' => array(
				'alias' => 'setting',
				'select' => 'bot_username',
			),
			'user' => array(
				'alias' => 'user',
				'select' => 'displayname',
			),
			'creation' => array(
				'alias' => 'creation',
				'select' => 'displayname',
			),
			'modified' => array(
				'alias' => 'modified',
				'select' => 'displayname',
			),
		);

		$criteria->compare('t.subscribe_id', strtolower($this->subscribe_id), true);
		$criteria->compare('t.status', $this->status);
		if(Yii::app()->getRequest()->getParam('setting'))
			$criteria->compare('t.setting_id', Yii::app()->getRequest()->getParam('setting'));
		else
			$criteria->compare('t.setting_id', $this->setting_id);
		if(Yii::app()->getRequest()->getParam('user'))
			$criteria->compare('t.user_id', Yii::app()->getRequest()->getParam('user'));
		else
			$criteria->compare('t.user_id', $this->user_id);
		$criteria->compare('t.telegram_id', strtolower($this->telegram_id), true);
		$criteria->compare('t.telegram_first_name', strtolower($this->telegram_first_name), true);
		$criteria->compare('t.telegram_last_name', strtolower($this->telegram_last_name), true);
		$criteria->compare('t.telegram_username', strtolower($this->telegram_username), true);
		$criteria->compare('t.telegram_type', strtolower($this->telegram_type), true);
		if($this->subscribe_date != null && !in_array($this->subscribe_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.subscribe_date)', date('Y-m-d', strtotime($this->subscribe_date)));
		if($this->creation_date != null && !in_array($this->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.creation_date)', date('Y-m-d', strtotime($this->creation_date)));
		if(Yii::app()->getRequest()->getParam('creation'))
			$criteria->compare('t.creation_id', Yii::app()->getRequest()->getParam('creation'));
		else
			$criteria->compare('t.creation_id', $this->creation_id);
		if($this->modified_date != null && !in_array($this->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.modified_date)', date('Y-m-d', strtotime($this->modified_date)));
		if(Yii::app()->getRequest()->getParam('modified'))
			$criteria->compare('t.modified_id', Yii::app()->getRequest()->getParam('modified'));
		else
			$criteria->compare('t.modified_id', $this->modified_id);
		
		$criteria->compare('setting.bot_username', strtolower($this->setting_search), true);
		$criteria->compare('user.displayname', strtolower($this->user_search), true);
		$criteria->compare('creation.displayname', strtolower($this->creation_search), true);
		$criteria->compare('modified.displayname', strtolower($this->modified_search), true);

		if(!Yii::app()->getRequest()->getParam('TelegrambotUsers_sort'))
			$criteria->order = 't.subscribe_id DESC';

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
			//$this->defaultColumns[] = 'subscribe_id';
			$this->defaultColumns[] = 'status';
			$this->defaultColumns[] = 'setting_id';
			$this->defaultColumns[] = 'user_id';
			$this->defaultColumns[] = 'telegram_id';
			$this->defaultColumns[] = 'telegram_first_name';
			$this->defaultColumns[] = 'telegram_last_name';
			$this->defaultColumns[] = 'telegram_username';
			$this->defaultColumns[] = 'telegram_type';
			$this->defaultColumns[] = 'subscribe_date';
			$this->defaultColumns[] = 'creation_date';
			$this->defaultColumns[] = 'creation_id';
			$this->defaultColumns[] = 'modified_date';
			$this->defaultColumns[] = 'modified_id';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			/*
			$this->defaultColumns[] = array(
				'class' => 'CCheckBoxColumn',
				'name' => 'id',
				'selectableRows' => 2,
				'checkBoxHtmlOptions' => array('name' => 'trash_id[]')
			);
			*/
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = array(
				'name' => 'user_search',
				'value' => '$data->user_id != 0 ? $data->user->displayname : \'-\'',
			);
			$this->defaultColumns[] = array(
				'name' => 'telegram_id',
				'value' => '$data->telegram_id != 0 ? $data->telegram_id : \'-\'',
				'htmlOptions' => array(
					'class' => 'center',
				),
			);
			$this->defaultColumns[] = array(
				'name' => 'telegram_username',
				'value' => '"@".$data->telegram_username',
			);
			$this->defaultColumns[] = 'telegram_first_name';
			$this->defaultColumns[] = 'telegram_last_name';
			$this->defaultColumns[] = array(
				'name' => 'setting_search',
				'value' => '"@".$data->setting->bot_username',
			);
			$this->defaultColumns[] = array(
				'header' => Yii::t('phrase', 'Subscribe'),
				'value' => 'CHtml::link($data->view->subscribes, Yii::app()->controller->createUrl("o/userhistory/manage", array(\'subscribe\'=>$data->subscribe_id, \'type\'=>\'subscribe\')))',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'type' => 'raw',
			);
			$this->defaultColumns[] = array(
				'header' => Yii::t('phrase', 'History'),
				'value' => 'CHtml::link($data->view->subscribe_history, Yii::app()->controller->createUrl("o/userhistory/manage", array(\'subscribe\'=>$data->subscribe_id)))',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'type' => 'raw',
			);
			$this->defaultColumns[] = array(
				'name' => 'telegram_type',
				'value' => '$data->telegram_type',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' =>array(
					'private'=>Yii::t('phrase', 'Private'),
					'group'=>Yii::t('phrase', 'Group'),
				),
				'type' => 'raw',
			);
			if(!Yii::app()->getRequest()->getParam('type')) {
				$this->defaultColumns[] = array(
					'name' => 'status',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("subscribe", array("id"=>$data->subscribe_id)), $data->status, 1)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter' => $this->filterYesNo(),
					'type' => 'raw',
				);
			}
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

	/**
	 * before validate attributes
	 */
	protected function beforeValidate() {
		if(parent::beforeValidate()) {
			$setting = TelegrambotSettings::getSetting(1);
				
			if($this->isNewRecord) {
				if($setting != null && count($setting) == 1)
					$this->setting_id = $setting[0]->setting_id;
				$this->creation_id = Yii::app()->user->id;
				
			} else
				$this->modified_id = Yii::app()->user->id;
		}
		return true;
	}

}