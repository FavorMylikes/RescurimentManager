<?php

/**
 * This is the model class for table "user_info".
 *
 */
class OptionsDetails extends CActiveRecord
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
		return '{{options_details}}';
	}
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
		return [];
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'details'=>'详情',
			'opt_category'=>'操作种类',
		);
	}

	public function getDetails($cate){
		$model=$this->findAllByAttributes(array('opt_category'=>$cate));
		$result=CHtml::listData($model,'id','details');
		$value=array_values($result);
		return array_combine($value,$value);
	}
}