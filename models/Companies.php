<?php
    namespace app\models;

    use Yii;

    class Companies extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'companies';
        }

        public function rules()
        {
            return [
                ['name', 'required', 'message' => 'Введите название вашей компании!'],
                ['inn', 'required', 'message' => 'Введите ИНН вашей компании!'],
                [['inn'], 'integer'],
                ['inn', 'string', 'min' => 10, 'max' => 10],
                ['general_information', 'required', 'message' => 'Введите общую информацию вашей компании!'],
                ['general_manager', 'required', 'message' => 'Введите генерального директора вашей компании!'],
                ['address', 'required', 'message' => 'Введите адрес вашей компании!'],
                ['phone', 'required', 'message' => 'Введите телефон вашей компании!'],
                [['name', 'general_manager', 'phone'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'name' => 'Название',
                'inn' => 'ИНН',
                'general_information' => 'Общая информация',
                'general_manager' => 'Генеральный директор',
                'address' => 'Адрес',
                'phone' => 'Телефон',
            ];
        }

        public function getComments()
        {
            return $this->hasMany(Comments::class, ['id_company' => 'id']);
        }
    }
?>