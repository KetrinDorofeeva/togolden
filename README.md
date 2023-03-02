# togolden

<table>
  <tr>
    <td><b>Технологии разработки</b></td>
    <td><b>Языки программирования</b></td>
    <td><b>Фреймворки</b></td>
    <td><b>База данных</b></td>
  </tr>
  
   <tr>
    <td><img src = "https://img.shields.io/badge/-HTML-orange?style=for-the-badge&logo=HTML5&labelColor=FFF6E8" alt = "HTML"></td>
     <td><img src = "https://img.shields.io/badge/-PHP-777BB4?style=for-the-badge&logo=PHP&labelColor=F0F1FA&logoColor=777BB4" alt = "PHP"></td>
     <td><img src = "https://img.shields.io/badge/-Yii-blue?style=for-the-badge&logo=Framework7&labelColor=F8F8FF&logoColor=blue" alt = "Yii2"></td>
     <td><img src = "https://img.shields.io/badge/-MySQL-4479A1?style=for-the-badge&logo=MySQL&labelColor=EFF8FF&logoColor=4479A1" alt = "MySQL"></td>
  </tr>
  
   <tr>
    <td><img src = "https://img.shields.io/badge/-CSS-1572B5?style=for-the-badge&logo=CSS3&labelColor=EAEBFE&logoColor=1572B5" alt = "CSS"></td>
    <td><img src = "https://img.shields.io/badge/-JavaScript-F7DF1E?style=for-the-badge&logo=JavaScript&labelColor=FFFDF1&logoColor=F7DF1E" alt = "JavaScript"></td>
    <td><img src = "https://img.shields.io/badge/-Bootstrap-800080?style=for-the-badge&logo=Bootstrap&labelColor=F4E7F4&logoColor=800080" alt = "Bootstrap4"></td>
    <td></td>
  </tr>
</table>

## <p id = "table-of-contents">Оглавление</p>
- <a href = "#database-design">База данных</a>
- <a href = "#yii2-framework">Yii2-framework</a>
  - <a href = "#installing-yii2-framework">Установка Yii2-фреймворка</a>
  - <a href = "#friendly-url">Настройка ЧПУ</a>
- <a href = "#implementation-software-product">Реализация программного продукта</a>
  - <a href = "#main-page">Компании</a>
  - <a href = "#registration">Регистрация</a>
  - <a href = "#authorization">Авторизация</a>
  - <a href = "#company-page">Страница компании</a>
  - <a href = "#add-company">Добавить компанию</a>
  - <a href = "#update-company">Редактировать компанию</a>
  - <a href = "#delete-company">Удалить компанию</a>

_________________________________________________________________________________________________________________________________________________________________
## <p id = "database-design">База данных</p>
![ER-диаграмма базы данных](https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/database-design.png)
![Таблицы и поля базы данных](https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/database-tables-and-fields.png)  
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

## <p id = "yii2-framework">Yii2-framework</p>
Для начала нужно [установить и настроить OpenServer](https://timeweb.com/ru/community/articles/ustanovka-i-nastroyka-openserver)  
**OpenServer** — готовая платформа для автоматизации работы мини-хостинга.  

### <p id = "installing-yii2-framework">Установка Yii2-фреймворка</p>
1. **Установка при помощи Composer**  
**Composer** - это пакетный менеджер уровня приложений для языка программирования PHP, который предоставляет средства по управлению зависимостями в PHP-приложении.  
Для того, чтобы установить Yii2-фреймворк, нужно открыть консоль в OpenServer:
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/console.png" width="250" alt = "Консоль в OpenServer" />

И ввести соответствующую команду:
```php
cd domains
composer create-project yiisoft/yii2-app-basic basic
  
//composer create-project yiisoft/yii2-app-версия придуманное_название_проекта
```
Эта команда устанавливает последнюю стабильную версию Yii в директорию ```basic```. Если хотите, можете выбрать другое имя директории.

2. <b>Установка из архива</b>  
Установка Yii из архива состоит из трёх шагов:
    - Скачайте архив с [yiiframework.com](https://www.yiiframework.com/download);
    - Создать папку в ```domains```;
    - Загрузить в папку архив;
    - Распаковать архив;
    - Зайти в папку ```config/web.php``` добавьте секретный ключ в значение cookieValidationKey (при установке через Composer это происходит автоматически):
```php
// !!! Напишите секретный ключ в поле (если оно пустое) - это требуется для проверки файлов cookie
'cookieValidationKey' => 'Введите_здесь_секретный_ключ_(произвольный_набор_символов)',
```
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "friendly-url">Настройка ЧПУ</p>
**ЧПУ** – красивые адреса, ставшие стандартом в веб-разработке.  
Фреймворк Yii2 из коробки не имеет настроенных ЧПУ, но исправить это крайне легко. По умолчанию сразу после установки фреймворка для доступа к главной странице необходимо обратиться к папке ```web```, в которой и лежит публичная часть Yii2 приложения. Для доступа к главной странице нужно набрать адрес «http://*название_проекта*/web/».  
От папки ```web``` можно легко избавиться с помощью файлов ```.htaccess```.  
```.htaccess``` в корне приложения:
```php
RewriteEngine on
RewriteRule ^(.+)?$ /web/$1
```
```.htaccess``` в папке ```web```:
```php
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```
Таким образом, папки ```web``` больше нет в адресной строке. Однако это еще не все. Для того, чтобы получить доступ к странице с формой, которая находится в действии ```actionIndex``` контроллера ```SiteController```, нужно набрать следующий адрес: «http://*название_проекта*/?r=site/index». Вместо такого адреса хотелось бы иметь возможность обратиться к данной странице по такому адресу: «http://*название_проекта*/site/index».  
Для решения поставленной задачи необходимо обратиться к файлу ```/config/web.php``` и прописать в массив ```components``` компонента ```urlManager``` необходимый код:
```php
'urlManager' => [
  'enablePrettyUrl' => true,
  'showScriptName' => false,
  'rules' => [
      
  ],
],
```
В элемент ```request``` массива ```components``` нужно добавить строчку ```'baseUrl' => ' '```:
```php
'components' => [
  'request' => [
    'cookieValidationKey' => 'произвольный_код',
    'baseUrl' => '',
  ],
  ...
],
```
Для связи проекта с базой данных в файле ```/config/db.php``` прописываются ```dbname```, ```username``` и ```password```:
```php
return [
  'class' => 'yii\db\Connection',
  'dsn' => 'mysql:host=localhost;dbname=название_базы_данных',
  'username' => 'логин_от_PhpMyAdmin',
  'password' => 'пароль_от_PhpMyAdmin',
  'charset' => 'utf8',
];
```
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

## <p id = "implementation-software-product">Реализация программного продукта</p>
### <p id = "main-page">Компании</p>
В зависимости от того, авторизован ли пользователь, на странице компаний отображаются определенные элементы.  
Страница компаний, как гостя, так и авторизованного пользователя, включает в себя:
1)  По 6 карточек компаний на каждой странице.  
    Каждая карточка имеет информацию: название компании, адрес, телефон и генеральный директор.
2)  Пагинация.

Контроллер:
```php
use app\models\Companies;
use yii\data\Pagination;

//Компании
public function actionIndex()
{
    $query = Companies::find();
    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
    $model = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['id' => SORT_DESC])->all();

    return $this->render('index', compact('model', 'pages'));
}
```

Модуль:
```php
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

    //Связь комментария с компанией
    public function getComments()
    {
        return $this->hasMany(Comments::class, ['id_company' => 'id']);
    }
}
```

Представление:
```php
<?php
    use yii\bootstrap4\Html;
    use yii\bootstrap4\LinkPager;

    $this->title = 'Компании';
?>

<div class="container">
    <div class="body-content">
        <div class="row">
            <?php
                foreach ($model as $company) {
            ?>
                    <div class="col-lg-3 bg-dark company_block">
                        <?php 
                            echo "<a href = '/site/view/$company->id'>";
                                echo "<span style='color: #FFC134; font-weight: bold'>" . $company->name . "</span><br>";
                                echo "<span class = 'title_company'>Адрес: </span>" . $company->address . "<br>";
                                echo "<span class = 'title_company'>Телефон: </span>" . $company->phone . "<br>";
                                echo "<span class = 'title_company'>Генеральный директор: </span>" . $company->general_manager;
                            echo "</a>";

                            if (!Yii::$app->user->isGuest && \Yii::$app->user->identity->id == $company->id_user) {
                                echo "<div style='margin-left: 96%'>" .
                                    "<div style='padding-bottom: 15px'>" . Html::a(Html::img('@web/img/pencil-fill.svg'), ['update', 'id' => $company->id]) . "</div>" .

                                    Html::a(Html::img('@web/img/trash-fill.svg'), ['delete', 'id' => $company->id], [
                                        'data' => [
                                            'confirm' => 'Вы уверены, что хотите удалить эту компанию?',
                                            'method' => 'post',
                                        ]
                                    ]) .
                                "</div>";
                            }
                        ?>
                    </div>
            <?php } ?>
        </div>

        <div class="mt-4">
            <?php
                if (!Yii::$app->user->isGuest) {
                    echo Html::a('Новая компания', ['create'], ['class' => 'btn btn-success']);
                }
            ?>
        </div>
    </div><br>

    <?= LinkPager::widget([
            'pagination' => $pages,
        ]);
    ?>
</div>
```

Десктопная версия (гость):  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/companies (guest).png" alt = "Компании (гость)" />

Мобильная версия (гость):

https://user-images.githubusercontent.com/93386515/221585366-692c3b2c-8b94-4671-a42f-ec39e3a0e31f.mp4

<br>
Авторизованный пользователь на странице компаний имеет возможность: добавлять компании, а также редактировать и удалять созданные им компании.<br>
Десктопная версия (пользователь):  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/companies (user).png" alt = "Компании (пользователь)" />

Мобильная версия (пользователь):

https://user-images.githubusercontent.com/93386515/222384238-47716c5b-9da9-452d-b495-3da662f9ccc1.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "registration">Регистрация</p>
Поля и их заполнение:  
<table>
  <tr>
    <td><b>Поля</b></td>
    <td><b>Обязательность заполнения</b></td>
    <td><b>Правила заполнения</b></td>
  </tr>
  <tr>
    <td>Логин</td>
    <td>Да</td>
    <td>Логин должен быть уникальным (не должен совпадать с логиным из базы данных).</td>
  </tr>
  <tr>
    <td>Пароль</td>
    <td>Да</td>
    <td>Пароль от 8 до 12 символов должен содержать хотя бы одну большую букву, одну маленькую букву и одну цифру.<br>Пример: Goodpassword7</td>
  </tr>
  <tr>
    <td>Повторите пароль</td>
    <td>Да</td>
    <td>Введенные данные должны совпадать с данными из поля "Пароль".</td>
  </tr>
</table>

Для того, чтобы пользователь смог зарегистрироваться, для начала нужно создать модель.     
**Модель (Model)** – предоставляет данные, позволяет работать с конкретной таблицей из базы данных и реагирует на команды контроллера, изменяя своё состояние.  
Для занесения данных зарегистрированного пользователя в базу данных, требуется получить таблицу с именем ``user``. Для этого используется статическая функция ``tableName``, которая возвращает имя таблиц. Функция ``attributeLabels`` возвращает ассоциативный массив, в котором передаются имена для отображения в представлении.  
Для более наглядного понимания безопасного заполнения полей данных информацией, стоит поподробнее описать функцию ``rules``. Она проверяет является ли выбранное поле строкой, числом и т.д. Также в ``rules`` при желании можно написать собственные валидаторы, которые можно будет использовать для своих каких-либо проверок.
<table>
  <tr>
    <td><b>Валидатор</b></td>
    <td><b>Описание</b></td>
    <td><b>Для каких полей</b></td>
  </tr>
  <tr>
    <td>required</td>
    <td>Поля обязательны для заполнения</td>
    <td>username, password, confirm_password</td>
  </tr>
  <tr>
    <td>unique</td>
    <td>Проверка на уникальность</td>
    <td>username</td>
  </tr>
  <tr>
    <td>match</td>
    <td>Проверка совпадения значения с заданным условием</td>
    <td>password</td>
  </tr>
  <tr>
    <td>pattern</td>
    <td>Регулярное выражение, с которым должно совпадать входящее значение</td>
    <td>password</td>
  </tr>
  <tr>
    <td>compare</td>
    <td>Проверка на совпадение</td>
    <td>confirm_password</td>
  </tr>
  <tr>
    <td>compareAttribute</td>
    <td>Сравнение введенного значения со значением из таблицы</td>
    <td>confirm_password</td>
  </tr>
  <tr>
    <td>message</td>
    <td>Сообщение/предупреждение</td>
    <td>username, password, confirm_password</td>
  </tr>
</table>

```php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use app\models\User;

class RegistrationForm extends ActiveRecord {
    public static function tableName() {
        return 'user';
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'confirm_password' => 'Повторите пароль',
        ];
    }

    public $confirm_password;

    public function rules() {
        return [
            [['username', 'password', 'confirm_password'], 'required'],
            ['username', 'unique'],
            ['password', 'match', 'pattern' => '/^\S*(?=\S{8,12})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', 'message' => 'Пароль от 8 до 12 символов должен содержать хотя бы одну большую букву, одну маленькую букву и одну цифру'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
        ];
    }

    public function registration() {
        if ($this->validate()) {
            $this->password = md5($this->password);

            if ($this->save(false)) {
                if (Yii::$app->user->login(User::findIdentity($this->id), 3600 * 24 * 30)) {
                    return true;
                }
            }
        }

        return false;
    }
}
```

Далее в контроллере ``SiteController`` было реализовано действие ``actionRegistration``.  
**Контроллер (Controller)** – при запуске выполняет соответствующее действие, что обычно подразумевает создание соответствующих моделей и отображение необходимых представлений.  
**Действие (Action)** – это метод класса контроллера, имя которого начинается на ``action``.  
В переменной ``$model`` при помощи ``new`` реализована связь с моделью ``RegistrationForm``. Вызов ``$model->load()`` ищет подмассив, который имеет имя, которое должно быть у формы модели, а уже из этого правильно именованного подмассива извлекает атрибуты. Для того, чтобы получить параметры запроса, нужно использовать методы ``Yii::$app->request->post()`` компонента ``request``. Вызов ``$model->registration()`` расписан в модели ``RegistrationForm``. Для перенаправления на домашнюю страницу в контроллере наследнике ``\yii\base\Controller`` есть метод ``goHome()``. Данный метод позволяет успешно зарегистрированному пользователю попасть сразу на главную страницу, а именно на страницу ``/site/index`` авторизированного пользователя.  
Передача введенных и автоматически прописанных данных, а именно ``username, password, confirm_password`` происходит при помощи метода ``render``, куда первым параметром поступает строка – название представления и информация, передаваемая представлению.  
В модели ``RegistrationForm`` прописана функция ``registration``, в которой проверяется валидность введенных данных при помощи метода ``$this->validate()``. Для безопасного хранения и использования хэшированных паролей в базе данных используется ``md5``. Если данных успешно прошли проверку на валидность, определяется ``id`` зарегистрированного пользователя, используя выражение ``Yii::$app->user->login(User::findIdentity($this->id))``. Оно возвращает экземпляр класса идентификатора, представляющего текущего пользователя, вошедшего в систему.  
```php
use app\models\RegistrationForm;

//Регистрация
public function actionRegistration() {
    $model = new RegistrationForm();

    if ($model->load(Yii::$app->request->post()) && $model->registration()) { 
        return $this->goHome();
    } 

    return $this->render('registration', compact('model'));
}
```

Наконец, представление.  
**Представление (View)** – отвечает за отображение данных модели пользователю, зашедшему на страницу сайта, реагируя на изменения модели.  
Представление содержит в себе ту информацию, которая передается ей в контроллере. Здесь осуществляется вёрстка данной страницы, и в места, где это нужно, вставляется информация из контроллера.   
Для создания интерактивной HTML-формы используется виджет ```ActiveForm```. Его следует описать поподробнее.  
В контроллере передается экземпляр этой модели (``$model``) в представление для виджета ``ActiveForm``, который генерирует форму. В вышеприведённом коде ``ActiveForm::begin()`` не только создаёт экземпляр формы, но также и знаменует её начало. Весь контент, расположенный между ``ActiveForm::begin()`` и ``ActiveForm::end()``, будет завёрнут в HTML-тег ``<form>``. Для создания в форме элемента с меткой и любой применимой валидацией с помощью JavaScript, вызывается ``ActiveForm::field()``, который возвращает экземпляр ``yii\bootstrap4\ActiveField``. Дополнительные HTML-элементы можно добавить к форме, используя обычный HTML или методы из класса помощника Html, как это было сделано с помощью ``Html::submitButton()``.

```php
<?php
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;

    $this->title = 'Регистрация';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class = "site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        $form = ActiveForm::begin([
            'id' => 'myform',
            'method' => 'post',
            'fieldConfig' => [
                'template' => '{label}{input}{error}',
            ],
        ]);

            echo $form->field($model, 'username')->textInput();
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'confirm_password')->passwordInput();
            echo "<br>";
            echo Html::submitButton("Зарегистрироваться", ['class' => 'btn btn-success']);
        ActiveForm::end(); 
    ?>
</div>
```

<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/registration.png" alt = "Регистрация" />

https://user-images.githubusercontent.com/93386515/222385674-795216de-e92b-4b03-8243-309834295069.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "authorization">Авторизация</p>
Поля и их заполнение:
<table>
  <tr>
    <td><b>Поля</b></td>
    <td><b>Обязательность заполнения</b></td>
    <td><b>Правила заполнения</b></td>
  </tr>
  <tr>
    <td>Логин</td>
    <td>Да</td>
    <td>Введенные данные должны совпадать с данными из таблицы.</td>
  </tr>
  <tr>
    <td>Пароль</td>
    <td>Да</td>
    <td>Введенные данные должны совпадать с данными из таблицы.</td>
  </tr>
  <tr>
    <td>Запомнить меня</td>
    <td>Нет</td>
    <td></td>
  </tr>
</table>

Для того, чтобы доступ к системе имели только авторизированные пользователи, используются фильтры контроля доступа (ACF).  
**ACF** – это фильтры, которые могут присоединяться к контроллеру или модулю как поведение.
```php
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
 
public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout', 'my', 'create', 'update', 'delete'],
            'rules' => [
                [
                    'actions' => ['logout', 'my', 'create', 'update', 'delete'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['post', 'get'],
            ],
        ],
    ];
}
```

Код выше показывает ACF фильтр, связанный с контроллером ```SiteController``` через поведение. Параметр ```only``` указывает, что фильтр ACF нужно применять только к действиям ```logout, create, update, delete```. Параметр ```rules``` задает правила доступа, которые означают следующее: разрешить аутентифицированным пользователям доступ к действиям ```logout, create, update, delete```.  
При попытке доступа к действиям ```logout, create, update, delete``` неавторизированного пользователя перенаправляет на форму авторизации, за которую отвечает метод действия ```actionLogin``` контроллера ```SiteController```. Это действие проверяет, не является ли пользователь гостем. Если условие возвращает ```false```, это значит, что пользователь авторизован и он попадает на главную страницу. Если возвращается ```true``` – создается экземпляр модели ```LoginForm```, в нее загружаются данные и вызывается метод ```login()```, который авторизует пользователя. Если данные загружены и метод ```login()``` вернул ```true```, то пользователь переносится туда, откуда он пришел. В противном случае, передается модель в вид ```login```.  

```php
use app\models\LoginForm;

//Авторизация
public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->goBack();
    }

    $model->password = '';
    return $this->render('login', compact('model'));
}
```

Выход пользователя из личного кабинета:
```php
//Выход из личного кабинета пользователя
public function actionLogout()
{
    Yii::$app->user->logout();

    return $this->goHome();
}

```

Метод ```login()``` проверяет данные на соответствие правилам, описанных в модели.  Здесь вызывается метод ```validatePassword()```, который при отсутствии ошибок создает объект ```User```, вызывая метод ```getUser()```. Метод проверяет, не авторизован ли пользователь. Если не авторизован – вызывается статический метод ```findByUsername()``` с переданным ему введенным именем пользователя класса ```User```.  
Модель ```User``` реализует интерфейс ```yii\web\IdentityInterface```. В данной моделе должно быть объявлено семь методов:

<table>
  <tr>
    <td><b>Методы</b></td>
    <td><b>Описание</b></td>
  </tr>
  <tr>
    <td>findIdentity()</td>
    <td>Данный метод находит экземпляр <code>identity class</code>, используя ID пользователя.</td>
  </tr>
  <tr>
    <td>findIdentityByAccessToken()</td>
    <td>Данный метод находит экземпляр <code>identity class</code>, используя токен доступа. Метод используется, когда требуется аутентифицировать пользователя только по секретному токену.</td>
  </tr>
  <tr>
    <td>findByUsername()</td>
    <td>Данный метод находит пользователя по его логину.</td>
  </tr>
  <tr>
    <td>getId()</td>
    <td>Данный метод возвращает ID пользователя, представленного данным экземпляром <code>identity</code>.</td>
  </tr>
  <tr>
    <td>getAuthKey()</td>
    <td>Данный метод возвращает ключ, используемый для основанной на cookie аутентификации. Ключ сохраняется в аутентификационной cookie и позже сравнивается с версией, находящейся на сервере, чтобы удостоверится, что аутентификационная cookie верная.</td>
  </tr>
  <tr>
    <td>validateAuthKey()</td>
    <td>Данный метод реализует логику проверки ключа для основанной на cookie аутентификации.</td>
  </tr>
  <tr>
    <td>validatePassword()</td>
    <td>Данный метод сравнивает хранящийся в базе данных пароль с тем, что ввел пользователь.</td>
  </tr>
</table>

А так же объявляется метод ```tableName()```, который укажет, что модель ```User``` будет взаимодействовать с таблицей ```user```.

```php
namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
```

Представление:
```php
<?php
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;

    $this->title = 'Войти';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => '{label}{input}{error}',
            ],
        ]);

        echo $form->field($model, 'username')->textInput();
        echo $form->field($model, 'password')->passwordInput();
        echo $form->field($model, 'rememberMe')->checkbox();
        echo "<br>";
        echo Html::submitButton("Войти", ['class' => 'btn btn-success']);
    ?>

    <?php ActiveForm::end(); ?>
</div>
```

<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/authorization.png" alt = "Авторизация" />

https://user-images.githubusercontent.com/93386515/222386988-57ee7419-a89e-4a46-b754-740a1cb1fd4a.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "company-page">Страница компании</p>
В зависимости от того, авторизован ли пользователь, на странице компании отображаются определенные элементы.  
Страница компании, как гостя, так и авторизованного пользователя, включает в себя расширенную информацию. Каждая компания имеет информацию: название компании, ИНН, общая информация, генеральный директор, адрес и телефон.  

Авторизованный пользователь имеет возможность:
1)  К каждому полю каждой компании оставить комментарии;
2)  Оставить комментарий к компании целиком;
3)  Видеть комментарии других пользователей.

Каждый комментарий включает в себя: время добавление, логин пользователя и текст комментария.  
Реализована интерактивность добавления комментария (поле ввода по умолчанию скрыто, открывается по желанию пользователя, закрывается после сохранения). При добавлении нового комментария на экране появляется оповещение, в котором сказано, что комментарий успешно добавлен.

Контроллер:
```php
use app\models\Companies;
use app\models\Comments;
    
//Страница компании
public function actionView($id)
{
    $model = Companies::findOne(['id' => $id]);
    $model_c = Comments::find($id)->where(['=', 'id_company', $id])->orderBy(['time_comment' => SORT_DESC])->all();

    //Добавить комментарий
    $model_cr = new Comments();

    if ($model_cr->load(Yii::$app->request->post())) {
        $model_cr->id_company = $id;
        $model_cr->id_user = Yii::$app->user->identity->id;
        $model_cr->time_comment = date('Y-m-d H:i:s');

        Yii::$app->session->setFlash('success', "Комментарий успешно добавлен");

        if ($model_cr->save(false)) {
            return $this->redirect(['view', 'id' => $id]);
        }
    }

    return $this->render('view', compact('model', 'model_c', 'model_cr'));
}
```

Модуль Companies указан в подразделе <a href = "#main-page">Компании</a>.  
Модуль Comments:
```php
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

    //Связь комментария с компанией
    public function getCompany()
    {
        return $this->hasOne(Companies::class, ['id' => 'id_company']);
    }

    //Связь комментария с пользователем
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
```

Представление:
```php
<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use yii\bootstrap4\ActiveForm;

    $this->title = $model->name;
    if (!Yii::$app->user->isGuest) {
        $this->params['breadcrumbs'][] = ['label' => 'Мои компании', 'url' => ['my']];
    }
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .alert-success.alert.alert-dismissible {
        margin-left: 0px;
    }
</style>

<br><div class="companies-view">
    <div id="accordion">
        <div class="card">
            <!--Название-->
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'name',
                                ],
                            ]);
                        ?>
                    </button>
                    
                    <?php
                        if (!Yii::$app->user->isGuest) { ?>
                            <span class="comment_chat" onmousedown = "viewNameCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->name_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->name_comment . "</span><br>";
                                }
                            }
                        ?>
                        
                        <!--Комментарии к названию компании-->
                        <div class="comments-form" id="add_name_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_nam_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'name_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--ИНН-->
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'inn',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php
                        if (!Yii::$app->user->isGuest) { ?>
                            <span class="comment_chat" onmousedown = "viewAddInnCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                     <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->inn_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->inn_comment . "</span><br>";
                                }
                            } 
                        ?>

                        <!--Комментарии к ИНН компании-->
                        <div class="comments-form" id="add_inn_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_in_n_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'inn_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Общая информация-->
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'general_information',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php
                        if (!Yii::$app->user->isGuest) { ?>
                            <span class="comment_chat" onmousedown = "viewGenInfCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->general_information_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->general_information_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к общую информацию компании-->
                        <div class="comments-form" id="add_general_information_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_gen_inf_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'general_information_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Генеральный директор-->
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'general_manager',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php
                        if (!Yii::$app->user->isGuest) { ?>
                            <span class="comment_chat" onmousedown = "viewGenManCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseFour" class="collapse show" aria-labelledby="headingFour">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->general_manager_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->general_manager_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к генеральному директору компании-->
                        <div class="comments-form" id="add_general_manager_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_gen_man_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'general_manager_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Адрес-->
            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'address',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php
                        if (!Yii::$app->user->isGuest) { ?>
                            <span class="comment_chat" onmousedown = "viewAddressCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->address_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->address_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к адресу компании-->
                        <div class="comments-form" id="add_address_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_addr_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'address_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!--Телефон-->
            <div class="card-header" id="headingSix">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'phone',
                                ],
                            ]);
                        ?>
                    </button>

                    <?php
                        if (!Yii::$app->user->isGuest) { ?>
                            <span class="comment_chat" onmousedown = "viewPhoneCom()">Прокомментировать <img style="width: 20px" src="/web/img/chat-fill.svg"></span>
                    <?php } ?>
                </h5>
            </div>
            <?php if (!Yii::$app->user->isGuest) { ?>
                <div id="collapseSix" class="collapse show" aria-labelledby="headingSix">
                    <div class="card-body">
                        <?php
                            foreach ($model_c as $comment) {
                                if ($comment->phone_comment !== NULL) {
                                    echo "<span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                                    "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                                    "<span style='margin-left: 10px'>" . $comment->phone_comment . "</span><br>";
                                }
                            }
                        ?>

                        <!--Комментарии к телефону компании-->
                        <div class="comments-form" id="add_phone_comment">
                            <?php $form = ActiveForm::begin([
                                'id' => 'add_ph_comment',
                                'method' => 'post',
                            ]);

                                echo $form->field($model_cr, 'phone_comment')->textInput();
                                echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                            ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><br>
        
        <!--Общие комментарии-->
        <?php if (!Yii::$app->user->isGuest) { ?>
            <span style="color: #FFC134; font-weight: bold; font-size: 25px">Общие комментарии</span>
            <span style="float: right; color: #eea90a; cursor: pointer" onmousedown = "viewGenCom()">Прокомментировать компанию <img style="width: 25px" src="/web/img/chat-fill.svg"></span>
    
            <?php foreach ($model_c as $comment) {
                if ($comment->general_comment !== NULL) {
                    echo "<div style='border-top: 1px solid #DFDFDF; margin-top: 25px'>";
                        echo "<br><span style='color: #7D7C7C'>" . $comment->time_comment . "</span>" .
                        "<span style='margin-left: 10px; color: #eea90a'>" . $comment->user->username . ":" . "</span>" .
                        "<span style='margin-left: 10px'>" . $comment->general_comment . "</span>";
                    echo "</div>";
                }
            } ?>

            <div class="comments-form" id="add_general_comment">
                <?php $form = ActiveForm::begin([
                    'id' => 'add_gen_comment',
                    'method' => 'post',
                ]);

                    echo $form->field($model_cr, 'general_comment')->textarea(['rows' => 6]);
                    echo Html::submitButton('Добавить комментарий', ['class' => 'btn btn-success']);
                ActiveForm::end(); ?>
            </div>
        <?php } ?>
    </div>
</div>
```

Создаем файл ```script.js``` в папке ```/web/js```:
```js
//При клике появляется поле для ввода комментария и кнопка
//Название
function viewNameCom() {
    document.getElementById("add_name_comment").style.display = "block";
};

//ИНН
function viewAddInnCom() {
    document.getElementById("add_inn_comment").style.display = "block";
}

//Общая информация
function viewGenInfCom() {
    document.getElementById("add_general_information_comment").style.display = "block";
};

//Генеральный директор
function viewGenManCom() {
    document.getElementById("add_general_manager_comment").style.display = "block";
};

//Адрес
function viewAddressCom() {
    document.getElementById("add_address_comment").style.display = "block";
};

//Телефон
function viewPhoneCom() {
    document.getElementById("add_phone_comment").style.display = "block";
};

//Общие комментарии
function viewGenCom() {
    document.getElementById("add_general_comment").style.display = "block";
};
```

Десктопная версия (гость):  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/company-page (guest).png" alt = "Страница компании (гость)" />

Десктопная версия (пользователь):  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/company-page_1 (user).png" alt = "Страница компании_1 (пользователь)" />

<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/company-page_2 (user).png" alt = "Страница компании_2 (пользователь)" /><br><br>

https://user-images.githubusercontent.com/93386515/222390277-bebe345b-05ee-4f62-bcc9-87b00fa174af.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "add-company">Добавить компанию</p>
Модуль Companies указан в подразделе <a href = "#main-page">Компании</a>. 

Поля для заполнения:  
1)  Название;
2)  ИНН;
3)  Общая информация;
4)  Генеральный директор;
5)  Адрес;
6)  Телефон.

При добавлении новой компании на экране появляется оповещение, в котором сказано, что компания успешно добавлена.

Контроллер:
```php
use app\models\Companies;

//Добавить новую компанию
public function actionCreate()
{
    $model = new Companies();

    if ($this->request->isPost) {
        if ($model->load($this->request->post())) {
            $model->id_user = Yii::$app->user->identity->id;

            Yii::$app->session->setFlash('success', "Новая компания успешно добавлена");

            if ($model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }
        }
    } else {
        $model->loadDefaultValues();
    }

    return $this->render('create', compact('model'));
}
```

Представление ```create```:
```php
<?php
    use yii\helpers\Html;

    $this->title = 'Новая компания';
    $this->params['breadcrumbs'][] = ['label' => 'Мои компании', 'url' => ['my']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="companies-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
```

Представление ```_form```:
```php
<?php
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;
?>

<div class="companies-form">
    <?php
        $form = ActiveForm::begin();
            echo $form->field($model, 'name')->textInput();
            echo $form->field($model, 'inn')->textInput();
            echo $form->field($model, 'general_information')->textarea(['rows' => 6]);
            echo $form->field($model, 'general_manager')->textInput();
            echo $form->field($model, 'address')->textarea(['rows' => 6]);
            echo $form->field($model, 'phone')->textInput();
    ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
```
Десктопная версия:  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/create-company.png" alt = "Добавление компании" />

Мобильная версия:

https://user-images.githubusercontent.com/93386515/221591283-70506e7c-596f-4c3c-8f08-fb38a7208f8d.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "update-company">Редактировать компанию</p>
Модуль Companies указан в подразделе <a href = "#main-page">Компании</a>. 

Поля для редактирования:  
1)  Название;
2)  ИНН;
3)  Общая информация;
4)  Генеральный директор;
5)  Адрес;
6)  Телефон.

При редактировании компании на экране появляется оповещение, в котором сказано, что компания успешно обновлена.

Контроллер:
```php
use app\models\Companies;

//Редактировать компанию
public function actionUpdate($id)
{
    $model = Companies::findOne($id);

    if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', "Компания успешно обновлена");

        return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('update', compact('model'));
}
```

Представление ```update```:
```php
<?php
    use yii\helpers\Html;

    $this->title = 'Редактировать компанию ' . $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Мои компании', 'url' => ['my']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Редактировать компанию ' . $model->name;
?>

<div class="companies-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
```

Представление ```_form```:
```php
<?php
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;
?>

<div class="companies-form">
    <?php
        $form = ActiveForm::begin();
            echo $form->field($model, 'name')->textInput();
            echo $form->field($model, 'inn')->textInput();
            echo $form->field($model, 'general_information')->textarea(['rows' => 6]);
            echo $form->field($model, 'general_manager')->textInput();
            echo $form->field($model, 'address')->textarea(['rows' => 6]);
            echo $form->field($model, 'phone')->textInput();
    ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
```

Десктопная версия:  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/update-company.png" alt = "Редактирование компании" />

Мобильная версия:

https://user-images.githubusercontent.com/93386515/222395436-ad1d4ceb-d96b-456e-893c-eaaf9b65eb57.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "delete-company">Удалить компанию</p>
При удалении компании на экране появляется оповещение, в котором сказано, что компания успешно удалена.

Контроллер:
```php
use app\models\Companies;

//Удалить компанию
public function actionDelete($id)
{
    $model = Companies::findOne($id);

    Companies::findOne($id)->delete();
    Yii::$app->session->setFlash('success', "Компания успешно удалена");

    return $this->redirect(['/site/index']);
    return $this->render(compact('model'));
}
```

Модуль Companies указан в подразделе <a href = "#main-page">Компании</a>.  
Изображение корзины, при нажатии на которую удаляется компания (и относящиеся к ней комментарии), находится в представлении ```index```, которое указано в подразделе  <a href = "#main-page">Компании</a>.

Десктопная версия:  
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/delete-company.png" alt = "Удаление компании" />

Мобильная версия:  

https://user-images.githubusercontent.com/93386515/222397061-e0570ffa-2dc1-4afe-b134-88c7e5f61136.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>
