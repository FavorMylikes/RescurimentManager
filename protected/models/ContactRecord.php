<?php

/**
 * This is the model class for table "user_info".
 *
 */
class ContactRecord extends CActiveRecord
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
		return '{{contact_record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'time'=>'时间',
			'content'=>'记录'
		);
	}

	public function search($id,$pageSize=6)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('user_id',$id);
		$criteria->order='time desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>$pageSize,
			)
		));
	}
}