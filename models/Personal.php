<?php
    namespace app\models;

    use Yii;
    use yii\web\UploadedFile;
    use yii\helpers\Url;

    class Personal extends \yii\db\ActiveRecord
    {
        public static function tableName()
        {
            return 'user';
        }

        public function rules()
        {
            return [
                [['surname', 'name', 'gender', 'date_birth', 'email', 'address'], 'required'],
                ['avatar', 'file', 'extensions' => 'png, jpg'],
                [['middle_name', 'phone', 'description'], 'safe'],
                ['email', 'email'],
            ];
        }

        public function attributeLabels()
        {
            return [
                'avatar' => 'Аватар',
                'surname' => 'Фамилия',
                'name' => 'Имя',
                'middle_name' => 'Отчество',
                'gender' => 'Пол',
                'date_birth' => 'Дата рождения',
                'phone' => 'Телефон',
                'email' => 'Email',
                'address' => 'Местоположение',
                'description' => 'Краткое описание'
            ];
        }

        public $avatar_now;

        public function uppage() {
            if ($this->validate()) {
                if ($this->avatar = UploadedFile::getInstance($this, 'avatar')) {
                    $file_name = time() . '_user.' . $this->avatar->extension;

                    if ($this->avatar->saveAs('avatars/' . $file_name)) {
                        if (file_exists($this->avatar_now)) {
                            unlink($this->avatar_now);
                        }
                        $this->avatar = 'avatars/' . $file_name;
                    }
                } else {
                    $this->avatar = $this->avatar_now;
                }
            }

            if ($this->save(false)) {
                Yii::$app->response->redirect(Url::to(['personal/page', 'id' => Yii::$app->user->id]));
            }
        }

        public function getComments()
        {
            return $this->hasMany(Comments::class, ['id_user' => 'id']);
        }

        public function getCompanies()
        {
            return $this->hasMany(Companies::class, ['id_user' => 'id']);
        }
    }
?>