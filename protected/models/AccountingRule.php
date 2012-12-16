<?php

/**
 * This is the model class for table "accounting_rule".
 *
 * The followings are the available columns in table 'accounting_rule':
 * @property integer $id
 * @property integer $input
 * @property integer $type_id
 * @property string $debitAccount1
 * @property string $creditAccount1
 * @property integer $user_id
 * @property string $createdon
 * @property string $updatedon
 */
class AccountingRule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccountingRule the static model class
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
		return 'accounting_rule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('input, type_id, debitAccount1, creditAccount1', 'required'),
			array('input, type_id', 'numerical', 'integerOnly'=>true),
			array('debitAccount1, creditAccount1', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, input, type_id, debitAccount1, creditAccount1, user_id, createdon, updatedon', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'input' => 'Input',
			'type_id' => 'Type',
			'debitAccount1' => 'Debit Account1',
			'creditAccount1' => 'Credit Account1',
			'user_id' => 'User',
			'createdon' => 'Createdon',
			'updatedon' => 'Updatedon',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('input',$this->input);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('debitAccount1',$this->debitAccount1,true);
		$criteria->compare('creditAccount1',$this->creditAccount1,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('updatedon',$this->updatedon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            // $this->createdon=$this->updatedon=time();
	            // $this->user_id=Yii::app()->user->id;
	            $this->user_id=1;
	        }
	        else
	            $this->updatedon=time();
	        return true;
	    }
	    else
	        return false;
	}
}