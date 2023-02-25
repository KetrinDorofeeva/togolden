# togolden

<table>
  <tr>
    <td><b>Технологии разработки</b></td>
    <td><b>Языки программирования</b></td>
    <td><b>Фреймворк</b></td>
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
    <td></td>
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
    $model = $query->offset($pages->offset)->limit($pages->limit)->all();

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

                            if (!Yii::$app->user->isGuest) {
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
<img src="https://github.com/ketrindorofeeva/togolden/raw/main/for-readme/companies (guest).png" alt = "Компании (десктопная версия)" />

Мобильная версия (гость):

https://user-images.githubusercontent.com/93386515/221370287-c783c671-14af-4eda-abf0-09b27703af69.mp4

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>
