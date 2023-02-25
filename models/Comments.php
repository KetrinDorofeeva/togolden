<?php
    namespace app\models;

    use Yii;

    class Comments extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'comments';
        }

        public function rules()
        {
            return [
                [['id_company', 'id_user', 'time_comment'], 'required'],
                [['name_comment', 'inn_comment', 'general_information_comment', 'general_manager_comment', 'address_comment', 'phone_comment', 'general_comment'], 'string'],
                [['time_comment'], 'safe'],
                [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::class, 'targetAttribute' => ['id_company' => 'id']],
                [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            ];
        }

        public function attributeLabels()
        {
            return [
                'name_comment' => '',
                'inn_comment' => '',
                'general_information_comment' => '',
                'general_manager_comment' => '',
                'address_comment' => '',
                'phone_comment' => '',
                'general_comment' => '',
            ];
        }

        public function getCompany()
        {
            return $this->hasOne(Companies::class, ['id' => 'id_company']);
        }

        public function getUser()
        {
            return $this->hasOne(User::class, ['id' => 'id_user']);
        }
    }
?>