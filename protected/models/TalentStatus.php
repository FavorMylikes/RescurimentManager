<?php

/**
 * This is the model class for table "user_info".
 *
 */
class TalentStatus extends CActiveRecord
{

	/**
	* Returns the static model of the specified AR class.
	* @param string $className active record class name.
	* @return UserInfo the static model class
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
		return '{{talent_status}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('middleman,opt_details,setup_datetime,talent_id,opt_user_id','safe',)
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'process' => array(self::BELONGS_TO, 'Options', 'status')
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => '用户ID',
			'status' =>'状态',
			'update_time' =>'更新时间',
			'middleman'=>'面试人',
			'setup_datetime'=>'安排时间',
			'opt_details'=>'操作详情',
		);
	}
}