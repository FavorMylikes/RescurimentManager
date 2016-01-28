<?php

/**
 * This is the model class for table "user_info".
 *
 */
class Options extends CActiveRecord
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
		return '{{options}}';
	}
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'options' => array(self::BELONGS_TO, 'Options', 'next_opt')
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'opt' => '状态',
			'操作' =>'next_opt',
			'opt_category' =>'操作类别',
		);
	}
}