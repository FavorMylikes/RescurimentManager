<?php

/**
 * This is the model class for table "user_info".
 *
 */
class Positions extends CActiveRecord
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
		return '{{positions}}';
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'partment_id' => '部门Id',
			'position' =>'岗位',
		);
	}
}