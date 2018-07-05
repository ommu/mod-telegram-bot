<?php
/**
 * TelegrambotSettings
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (www.ommu.co)
 * @created date 7 January 2017, 01:58 WIB
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
 * This is the model class for table "ommu_telegrambot_settings".
 *
 * The followings are the available columns in table 'ommu_telegrambot_settings':
 * @property integer $setting_id
 * @property integer $publish
 * @property integer $default
 * @property string $bot_username
 * @property string $bot_token
 * @property string $bot_name
 * @property string $bot_description
 * @property string $bot_about_text
 * @property string $bot_userpic
 * @property string $webhook_url
 * @property string $webhook_certificate
 * @property integer $webhook_max_connections
 * @property string $webhook_allowed_updates
 * @property string $modified_date
 * @property string $modified_id
 *
 * The followings are the available model relations:
 * @property TelegrambotCommands[] $TelegrambotCommands
 * @property TelegrambotUsers[] $TelegrambotUsers
 */
class TelegrambotSettings extends CActiveRecord
{
	public $defaultColumns = array();
	
	// Variable Search
	public $modified_search;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TelegrambotSettings the static model class
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
		return 'ommu_telegrambot_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publish, default, bot_username, bot_token, bot_name, webhook_url', 'required'),
			array('publish, default, webhook_max_connections', 'numerical', 'integerOnly'=>true),
			array('bot_username, bot_name', 'length', 'max'=>32),
			array('modified_id', 'length', 'max'=>11),
			array('bot_description, bot_about_text, bot_userpic, webhook_certificate, webhook_max_connections, webhook_allowed_updates', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('setting_id, publish, default, bot_username, bot_token, bot_name, bot_description, bot_about_text, bot_userpic, webhook_url, webhook_certificate, webhook_max_connections, webhook_allowed_updates, modified_date, modified_id,
				modified_search', 'safe', 'on'=>'search'),
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
			'commands' => array(self::HAS_MANY, 'TelegrambotCommands', 'setting_id'),
			'users' => array(self::HAS_MANY, 'TelegrambotUsers', 'setting_id'),
			'modified' => array(self::BELONGS_TO, 'Users', 'modified_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'setting_id' => Yii::t('attribute', 'Setting'),
			'publish' => Yii::t('attribute', 'Publish'),
			'default' => Yii::t('attribute', 'Default'),
			'bot_username' => Yii::t('attribute', 'Username'),
			'bot_token' => Yii::t('attribute', 'Token'),
			'bot_name' => Yii::t('attribute', 'Name'),
			'bot_description' => Yii::t('attribute', 'Description'),
			'bot_about_text' => Yii::t('attribute', 'About Text'),
			'bot_userpic' => Yii::t('attribute', 'User Picture'),
			'webhook_url' => Yii::t('attribute', 'Webhook Url'),
			'webhook_certificate' => Yii::t('attribute', 'Webhook Certificate'),
			'webhook_max_connections' => Yii::t('attribute', 'Webhook Max Connections'),
			'webhook_allowed_updates' => Yii::t('attribute', 'Webhook Allowed Updates'),
			'modified_date' => Yii::t('attribute', 'Modified Date'),
			'modified_id' => Yii::t('attribute', 'Modified'),
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
			'modified' => array(
				'alias'=>'modified',
				'select'=>'displayname',
			),
		);

		$criteria->compare('t.setting_id', $this->setting_id);
		if(Yii::app()->getRequest()->getParam('type') == 'publish')
			$criteria->compare('t.publish', 1);
		elseif(Yii::app()->getRequest()->getParam('type') == 'unpublish')
			$criteria->compare('t.publish', 0);
		elseif(Yii::app()->getRequest()->getParam('type') == 'trash')
			$criteria->compare('t.publish', 2);
		else {
			$criteria->addInCondition('t.publish', array(0,1));
			$criteria->compare('t.publish', $this->publish);
		}
		$criteria->compare('t.default', $this->default);
		$criteria->compare('t.bot_username', strtolower($this->bot_username), true);
		$criteria->compare('t.bot_token', strtolower($this->bot_token), true);
		$criteria->compare('t.bot_name', strtolower($this->bot_name), true);
		$criteria->compare('t.bot_description', strtolower($this->bot_description), true);
		$criteria->compare('t.bot_about_text', strtolower($this->bot_about_text), true);
		$criteria->compare('t.bot_userpic', strtolower($this->bot_userpic), true);
		$criteria->compare('t.webhook_url', strtolower($this->webhook_url), true);
		$criteria->compare('t.webhook_certificate', strtolower($this->webhook_certificate), true);
		$criteria->compare('t.webhook_max_connections', $this->webhook_max_connections);
		$criteria->compare('t.webhook_allowed_updates', strtolower($this->webhook_allowed_updates), true);
		if($this->modified_date != null && !in_array($this->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')))
			$criteria->compare('date(t.modified_date)', date('Y-m-d', strtotime($this->modified_date)));
		if(Yii::app()->getRequest()->getParam('modified'))
			$criteria->compare('t.modified_id', Yii::app()->getRequest()->getParam('modified'));
		else
			$criteria->compare('t.modified_id', $this->modified_id);
		
		$criteria->compare('modified.displayname', strtolower($this->modified_search), true);

		if(!Yii::app()->getRequest()->getParam('TelegrambotSettings_sort'))
			$criteria->order = 't.setting_id DESC';

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
			//$this->defaultColumns[] = 'setting_id';
			$this->defaultColumns[] = 'publish';
			$this->defaultColumns[] = 'default';
			$this->defaultColumns[] = 'bot_username';
			$this->defaultColumns[] = 'bot_token';
			$this->defaultColumns[] = 'bot_name';
			$this->defaultColumns[] = 'bot_description';
			$this->defaultColumns[] = 'bot_about_text';
			$this->defaultColumns[] = 'bot_userpic';
			$this->defaultColumns[] = 'webhook_url';
			$this->defaultColumns[] = 'webhook_certificate';
			$this->defaultColumns[] = 'webhook_max_connections';
			$this->defaultColumns[] = 'webhook_allowed_updates';
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
				'name' => 'bot_username',
				'value' => '"@".$data->bot_username',
			);
			$this->defaultColumns[] = array(
				'name' => 'bot_name',
				'value' => '$data->bot_name',
			);
			$this->defaultColumns[] = array(
				'name' => 'modified_search',
				'value' => '$data->modified->displayname',
			);
			$this->defaultColumns[] = array(
				'name' => 'modified_date',
				'value' => 'Utility::dateFormat($data->modified_date)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('application.libraries.core.components.system.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'modified_date',
					'language' => 'en',
					'i18nScriptFile' => 'jquery-ui-i18n.min.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'modified_date_filter',
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
			if(!Yii::app()->getRequest()->getParam('type')) {
				$this->defaultColumns[] = array(
					'name' => 'default',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("default", array("id"=>$data->setting_id)), $data->default, 1)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
				$this->defaultColumns[] = array(
					'name' => 'publish',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("publish", array("id"=>$data->setting_id)), $data->publish, 1)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
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
	 * User get information
	 */	
	public static function getSetting($publish=null, $type=null) 
	{
		$criteria=new CDbCriteria;
		if($publish != null)
			$criteria->compare('t.publish', $publish);
		$criteria->order = 'setting_id ASC';
		
		$model = self::model()->findAll($criteria);
		
		if($type != null && $type == 'array') {
			$items = array();
			if($model != null) {
				foreach($model as $key => $val)
					$items[$val->setting_id] = $val->bot_username;
			}
			$return = $items;
			
		} else
			$return = $model;
		
		return $return;
	}

	/**
	 * before validate attributes
	 */
	protected function beforeValidate() {
		if(parent::beforeValidate()) {
			if($this->default == 1 && $this->publish == 0)
				$this->addError('publish', Yii::t('phrase', 'Default hanya digunakan untuk BOT Setting yang dalam kondisi terpublish'));
			
			$this->modified_id = Yii::app()->user->id;
		}
		return true;
	}

}